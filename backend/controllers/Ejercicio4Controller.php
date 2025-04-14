<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\BadRequestHttpException;

class Ejercicio4Controller extends Controller
{
    public function actionEjercicio4()
    {
        $resultado = null;
        $error = null;

        $model = new \yii\base\DynamicModel(['profesor_id']);
        $model->addRule('profesor_id', 'required');
        $model->addRule('profesor_id', 'integer');

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            if ($model->validate()) {
                $profesorId = $model->profesor_id;

                try {
                    $connection = Yii::$app->db;
                    $resultado = $connection->createCommand("CALL obtener_cursos_asignados_por_profesor(:id)")
                        ->bindValue(':id', $profesorId)
                        ->queryAll();
                } catch (\yii\db\Exception $e) {
                    $error = $e->getMessage();
                }
            } else {
                $error = "Por favor ingrese un ID válido.";
            }
        }

        return $this->render('ejercicio4', [
            'resultado' => $resultado,
            'error' => $error,
            'model' => $model,
        ]);
    }
}
