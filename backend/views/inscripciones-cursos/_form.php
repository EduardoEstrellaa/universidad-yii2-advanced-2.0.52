<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\InscripcionesCursos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="inscripciones-cursos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estudiante_id')->textInput() ?>

    <?= $form->field($model, 'horario_id')->textInput() ?>

    <?= $form->field($model, 'calificacion_final')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'en_curso' => 'En curso', 'aprobado' => 'Aprobado', 'reprobado' => 'Reprobado', 'retirado' => 'Retirado', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
