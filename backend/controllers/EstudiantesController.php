<?php

namespace backend\controllers;

use backend\models\Estudiantes;
use backend\models\search\EstudiantesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * EstudiantesController implements the CRUD actions for Estudiantes model.
 */
class EstudiantesController extends Controller
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
     * Lists all Estudiantes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EstudiantesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estudiantes model.
     * @param int $estudiante_id Estudiante ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($estudiante_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($estudiante_id),
        ]);
    }

    /**
     * Creates a new Estudiantes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Estudiantes();
        $error = null;
        $resultado = null;
        $logData = null; // Para almacenar datos del log

        if ($this->request->isPost) {
            $model->load($this->request->post());

            $db = Yii::$app->db;

            try {
                $command = $db->createCommand("CALL sp_alta_estudiante(
                    :nombre, :apellido, :fecha_nacimiento, :genero,
                    :direccion, :telefono, :email, :fecha_ingreso,
                    @estudiante_id, @resultado, @error
                )");

                $command->bindValues([
                    ':nombre' => $model->nombre,
                    ':apellido' => $model->apellido,
                    ':fecha_nacimiento' => $model->fecha_nacimiento,
                    ':genero' => $model->genero,
                    ':direccion' => $model->direccion,
                    ':telefono' => $model->telefono,
                    ':email' => $model->email,
                    ':fecha_ingreso' => $model->fecha_ingreso,
                ]);

                $command->execute();

                $output = $db->createCommand("
                    SELECT @estudiante_id as estudiante_id, 
                           @resultado as resultado, 
                           @error as error
                ")->queryOne();

                if (!empty($output['error'])) {
                    $error = $output['error'];
                    $resultado = $output['resultado'] ?? null;

                    // Obtener el último log de error para este email
                    $logData = $this->obtenerUltimoLogError($model->email);

                    $this->asignarErroresTrigger($model, $error);
                } else {
                    $resultado = $output['resultado'];
                    Yii::$app->session->setFlash('success', $resultado);
                    return $this->redirect(['view', 'estudiante_id' => $output['estudiante_id']]);
                }
            } catch (\yii\db\Exception $e) {
                $error = $this->procesarErrorTrigger($e->getMessage());
                $this->asignarErroresTrigger($model, $error);

                // Obtener el último log de error
                if ($model->email) {
                    $logData = $this->obtenerUltimoLogError($model->email);
                }
            } catch (\Exception $e) {
                $error = "Error al ejecutar el procedimiento: " . $e->getMessage();
            }
        }

        return $this->render('create', [
            'model' => $model,
            'error' => $error,
            'resultado' => $resultado,
            'logData' => $logData // Pasamos los datos del log a la vista
        ]);
    }

    protected function obtenerUltimoLogError($email)
    {
        try {
            $result = Yii::$app->db->createCommand("
                SELECT mensaje, datos_nuevos, fecha_hora 
                FROM log_acciones 
                WHERE tabla_afectada = 'estudiantes' 
                AND tipo_operacion = 'INSERT' 
                AND accion_realizada LIKE '%bloqueado%'
                ORDER BY fecha_hora DESC 
                LIMIT 1
            ")->queryOne();

            // Verificar si el email coincide (manualmente)
            if ($result && isset($result['datos_nuevos'])) {
                $datos = json_decode($result['datos_nuevos'], true);
                if (isset($datos['email']) && $datos['email'] === $email) {
                    return $result;
                }
            }

            return null;
        } catch (\Exception $e) {
            Yii::error("Error al obtener logs: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Procesa el mensaje de error del trigger para mostrarlo de forma amigable
     */
    protected function procesarErrorTrigger($errorMessage)
    {
        // Extraer solo la parte del mensaje que nos interesa
        if (preg_match('/SQLSTATE\[45000\]: (.+)/', $errorMessage, $matches)) {
            return $matches[1];
        }
        return $errorMessage;
    }

    /**
     * Asigna errores a los campos correspondientes según el mensaje del trigger
     */
    protected function asignarErroresTrigger($model, $error)
    {
        if (
            strpos($error, 'correo electrónico') !== false ||
            strpos($error, 'dominio @valladolid.tecnm.mx') !== false
        ) {
            $model->addError('email', $error);
        } elseif (strpos($error, 'número telefónico') !== false) {
            $model->addError('telefono', $error);
        }
        // Puedes agregar más condiciones para otros campos si es necesario
    }

    /**
     * Updates an existing Estudiantes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $estudiante_id Estudiante ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($estudiante_id)
    {
        $model = $this->findModel($estudiante_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'estudiante_id' => $model->estudiante_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Estudiantes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $estudiante_id Estudiante ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($estudiante_id)
    {
        $this->findModel($estudiante_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estudiantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $estudiante_id Estudiante ID
     * @return Estudiantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($estudiante_id)
    {
        if (($model = Estudiantes::findOne(['estudiante_id' => $estudiante_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
