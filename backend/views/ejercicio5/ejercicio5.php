<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Estudiantes que nunca han reprobado un curso';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

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
    <h3>Estudiantes con Promedio de Cursos Aprobados:</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Estudiante</th>
                <th>Nombre Estudiante</th>
                <th>Carrera</th>
                <th>Cantidad de Cursos Aprobados</th>
                <th>Promedio General</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $fila): ?>
                <tr>
                    <td><?= Html::encode($fila['estudiante_id']) ?></td>
                    <td><?= Html::encode($fila['nombre_estudiante']) ?></td>
                    <td><?= Html::encode($fila['carrera']) ?></td>
                    <td><?= Html::encode($fila['cantidad_cursos_aprobados']) ?></td>
                    <td><?= Html::encode($fila['promedio_general']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>