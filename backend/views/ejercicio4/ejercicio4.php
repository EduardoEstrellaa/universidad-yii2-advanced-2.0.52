<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Profesores con cantidad de cursos asignados';
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
    <h3>Información del Profesor:</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Profesor</th>
                <th>Especialidad</th>
                <th>Departamento</th>
                <th>Cursos Asignados Actualmente</th>
                <th>Cursos Anteriores</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $fila): ?>
                <tr>
                    <td><?= Html::encode($fila['nombre_completo']) ?></td>
                    <td><?= Html::encode($fila['especialidad']) ?></td>
                    <td><?= Html::encode($fila['departamento']) ?></td>
                    <td><?= Html::encode($fila['mensaje']) ?></td>
                    <td><?= Html::encode($fila['cursos_anteriores']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>