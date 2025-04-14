<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\InscripcionesCursosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="inscripciones-cursos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'inscripcion_id') ?>

    <?= $form->field($model, 'estudiante_id') ?>

    <?= $form->field($model, 'horario_id') ?>

    <?= $form->field($model, 'calificacion_final') ?>

    <?= $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
