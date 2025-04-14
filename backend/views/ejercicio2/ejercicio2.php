<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Cursos no asignados a un profesor';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'profesor_id')->textInput()->label('ID del Profesor') ?>

<div class="form-group">
    <?= Html::submitButton('Consultar', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php if ($error): ?>
    <div class="alert alert-danger">
        <strong>Error:</strong> <?= Html::encode($error) ?>
    </div>
<?php endif; ?>

<?php if ($resultado): ?>
    <h3>Cursos no asignados:</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Curso ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $fila): ?>
                <tr>
                    <td><?= Html::encode($fila['curso_id']) ?></td>
                    <td><?= Html::encode($fila['nombre']) ?></td>
                    <td><?= Html::encode($fila['descripcion']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>