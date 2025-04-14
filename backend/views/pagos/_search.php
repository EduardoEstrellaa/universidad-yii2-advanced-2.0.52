<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\PagosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pagos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pago_id') ?>

    <?= $form->field($model, 'estudiante_id') ?>

    <?= $form->field($model, 'monto') ?>

    <?= $form->field($model, 'fecha_pago') ?>

    <?= $form->field($model, 'concepto') ?>

    <?php // echo $form->field($model, 'metodo_pago') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'semestre_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
