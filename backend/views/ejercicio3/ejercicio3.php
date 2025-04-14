<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Información del Estudiante';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'estudiante_id')->textInput()->label('ID del Estudiante') ?>

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
    <h3>Información del Estudiante:</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Estudiante ID</th>
                <th>Nombre Completo</th>
                <th>Carrera</th>
                <th>Promedio</th>
                <th>Créditos Aprobados</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $fila): ?>
                <tr>
                    <td><?= Html::encode($fila['estudiante_id']) ?></td>
                    <td><?= Html::encode($fila['nombre_completo_estudiante']) ?></td>
                    <td><?= Html::encode($fila['nombre_carrera']) ?></td>
                    <td><?= Html::encode($fila['promedio_estudiante']) ?></td>
                    <td><?= Html::encode($fila['total_creditos_aprobados']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>