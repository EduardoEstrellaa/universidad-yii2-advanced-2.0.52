<?php

namespace backend\controllers;

use backend\models\Pagos;
use backend\models\search\PagosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * PagosController implements the CRUD actions for Pagos model.
 */
class PagosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Pagos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PagosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pagos model.
     * @param int $pago_id Pago ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pago_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pago_id),
        ]);
    }

    /**
     * Creates a new Pagos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pagos();
        $error = null;
        $resultado = null;

        if ($this->request->isPost) {
            $model->load($this->request->post());

            $db = Yii::$app->db;

            try {
                // Preparar parámetros para el procedimiento almacenado
                $command = $db->createCommand("CALL sp_procesar_pago(
                    :estudiante_id, :monto, :concepto, :metodo_pago, :semestre_id,
                    @pago_id, @resultado, @error
                )");

                $command->bindValues([
                    ':estudiante_id' => $model->estudiante_id,
                    ':monto' => $model->monto,
                    ':concepto' => $model->concepto,
                    ':metodo_pago' => $model->metodo_pago,
                    ':semestre_id' => $model->semestre_id,
                ]);

                $command->execute();

                // Obtener los parámetros de salida
                $output = $db->createCommand("
                    SELECT @pago_id as pago_id, 
                           @resultado as resultado, 
                           @error as error
                ")->queryOne();

                if (!empty($output['error'])) {
                    // Asociar errores específicos a los campos
                    if (strpos($output['error'], 'Estudiante') !== false) {
                        $model->addError('estudiante_id', $output['error']);
                    }
                    if (strpos($output['error'], 'Semestre') !== false) {
                        $model->addError('semestre_id', $output['error']);
                    }
                    // Mostrar también el resultado (que contiene el mensaje descriptivo)
                    $resultado = $output['resultado'];
                    $error = $output['error'];
                } else {
                    // Guardar ambos: resultado y pago_id en la sesión
                    Yii::$app->session->setFlash('success', $output['resultado']);
                    Yii::$app->session->setFlash('pago_id', $output['pago_id']);
                    return $this->redirect(['view', 'pago_id' => $output['pago_id']]);
                }
            } catch (\Exception $e) {
                $error = "Error al ejecutar el procedimiento: " . $e->getMessage();
            }
        } else {
            // Valores por defecto
            $model->fecha_pago = date('Y-m-d');
            $model->estado = 'completo';
        }

        return $this->render('create', [
            'model' => $model,
            'error' => $error,
            'resultado' => $resultado
        ]);
    }

    /**
     * Updates an existing Pagos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pago_id Pago ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pago_id)
    {
        $model = $this->findModel($pago_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pago_id' => $model->pago_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pagos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pago_id Pago ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pago_id)
    {
        $this->findModel($pago_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pagos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pago_id Pago ID
     * @return Pagos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pago_id)
    {
        if (($model = Pagos::findOne(['pago_id' => $pago_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
