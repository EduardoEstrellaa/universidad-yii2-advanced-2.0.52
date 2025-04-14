<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Estudiantes */
/* @var $error string|null */
/* @var $resultado string|null */

$this->title = 'Registrar Nuevo Estudiante';
?>

<?php if (isset($error)): ?>
    <div class="alert alert-danger">
        <strong>Error:</strong> <?= Html::encode($error) ?>
    </div>
<?php endif; ?>

<?php if (isset($resultado)): ?>
    <div class="alert alert-success">
        <?= Html::encode($resultado) ?>
    </div>
<?php endif; ?>

<div class="estudiantes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'fecha_nacimiento')->input('date') ?>
    <?= $form->field($model, 'genero')->dropDownList(
        $model::getOpcionesGenero(),
        ['prompt' => 'Seleccione...']
    ) ?>
    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'fecha_ingreso')->input('date') ?>
    <?= $form->field($model, 'estado')->dropDownList(
        $model::getOpcionesEstado(),
        ['prompt' => 'Seleccione...']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>