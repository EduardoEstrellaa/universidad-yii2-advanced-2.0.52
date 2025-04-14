<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Pagos $model */
/** @var string|null $error */
/** @var string|null $resultado */

$this->title = 'Registrar Pago';
?>

<div class="pagos-form">

    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <strong>Error:</strong> <?= Html::encode($error) ?>
            <?php if (isset($resultado)): ?>
                <div><?= Html::encode($resultado) ?></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estudiante_id')->textInput() ?>
    
    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_pago')->input('date') ?>

    <?= $form->field($model, 'concepto')->dropDownList(
        $model::getOpcionesConcepto(), 
        ['prompt' => 'Seleccione...']
    ) ?>

    <?= $form->field($model, 'metodo_pago')->dropDownList(
        $model::getOpcionesMetodoPago(),
        ['prompt' => 'Seleccione...']
    ) ?>

    <?= $form->field($model, 'estado')->dropDownList(
        $model::getOpcionesEstado(),
        ['prompt' => 'Seleccione...']
    ) ?>

    <?= $form->field($model, 'semestre_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>