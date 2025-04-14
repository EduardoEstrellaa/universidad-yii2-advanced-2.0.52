<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Pagos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pagos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estudiante_id')->textInput() ?>

    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_pago')->textInput() ?>

    <?= $form->field($model, 'concepto')->dropDownList([ 'matricula' => 'Matricula', 'mensualidad' => 'Mensualidad', 'otros' => 'Otros', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'metodo_pago')->dropDownList([ 'efectivo' => 'Efectivo', 'tarjeta' => 'Tarjeta', 'transferencia' => 'Transferencia', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'completo' => 'Completo', 'pendiente' => 'Pendiente', 'atrasado' => 'Atrasado', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'semestre_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
