<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\BadRequestHttpException;

class Ejercicio3Controller extends Controller
{
    public function actionEjercicio3()
    {
        $resultado = null;
        $error = null;

        $model = new \yii\base\DynamicModel(['estudiante_id']);
        $model->addRule('estudiante_id', 'required');
        $model->addRule('estudiante_id', 'integer');

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            if ($model->validate()) {
                $estudianteId = $model->estudiante_id;

                try {
                    $connection = Yii::$app->db;
                    $resultado = $connection->createCommand("CALL obtener_informacion_estudiantes(:id)")
                        ->bindValue(':id', $estudianteId)
                        ->queryAll();
                } catch (\yii\db\Exception $e) {
                    $error = $e->getMessage();
                }
            } else {
                $error = "Por favor ingrese un ID válido.";
            }
        }

        return $this->render('ejercicio3', [
            'resultado' => $resultado,
            'error' => $error,
            'model' => $model,
        ]);
    }
}
