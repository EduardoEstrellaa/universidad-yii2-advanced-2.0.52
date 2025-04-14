<?php

namespace backend\controllers;

use backend\models\InscripcionesCursos;
use backend\models\search\InscripcionesCursosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\LogAcciones;
use yii\db\Exception;


/**
 * InscripcionesCursosController implements the CRUD actions for InscripcionesCursos model.
 */
class InscripcionesCursosController extends Controller
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
     * Lists all InscripcionesCursos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InscripcionesCursosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InscripcionesCursos model.
     * @param int $inscripcion_id Inscripcion ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($inscripcion_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($inscripcion_id),
        ]);
    }

    /**
     * Creates a new InscripcionesCursos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new InscripcionesCursos();
        $error = null;
        $logData = null;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                try {
                    if ($model->save()) {
                        return $this->redirect(['view', 'inscripcion_id' => $model->inscripcion_id]);
                    }
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    $logData = LogAcciones::find()
                        ->where(['tabla_afectada' => 'inscripciones_cursos'])
                        ->orderBy(['log_id' => SORT_DESC])
                        ->asArray()
                        ->one();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'error' => $error,
            'logData' => $logData,
        ]);
    }

    /**
     * Updates an existing InscripcionesCursos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $inscripcion_id Inscripcion ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($inscripcion_id)
    {
        $model = $this->findModel($inscripcion_id);
        $error = null;
        $logData = null;

        if ($this->request->isPost && $model->load($this->request->post())) {
            try {
                if ($model->save()) {
                    return $this->redirect(['view', 'inscripcion_id' => $model->inscripcion_id]);
                }
            } catch (Exception $e) {
                $error = $e->getMessage();
                $logData = LogAcciones::find()
                    ->where(['tabla_afectada' => 'inscripciones_cursos', 'id_registro_afectado' => $model->inscripcion_id])
                    ->orderBy(['log_id' => SORT_DESC])
                    ->asArray()
                    ->one();
            }
        }

        return $this->render('update', [
            'model' => $model,
            'error' => $error,
            'logData' => $logData,
        ]);
    }

    /**
     * Deletes an existing InscripcionesCursos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $inscripcion_id Inscripcion ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($inscripcion_id)
    {
        $this->findModel($inscripcion_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InscripcionesCursos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $inscripcion_id Inscripcion ID
     * @return InscripcionesCursos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($inscripcion_id)
    {
        if (($model = InscripcionesCursos::findOne(['inscripcion_id' => $inscripcion_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
