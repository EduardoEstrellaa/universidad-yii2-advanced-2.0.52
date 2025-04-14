<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\BadRequestHttpException;

class Ejercicio5Controller extends Controller
{
    public function actionEjercicio5()
    {
        $resultado = null;
        $error = null;

        // Crear un modelo dinámico para la validación
        $model = new \yii\base\DynamicModel([]);

        if (Yii::$app->request->isPost) {
            try {
                $connection = Yii::$app->db;
                // Llamar al procedimiento almacenado
                $resultado = $connection->createCommand("CALL obtener_promedio_cursos_aprobados()")
                    ->queryAll();
            } catch (\yii\db\Exception $e) {
                $error = $e->getMessage();
            }
        }

        return $this->render('ejercicio5', [
            'resultado' => $resultado,
            'error' => $error,
            'model' => $model,
        ]);
    }
}
