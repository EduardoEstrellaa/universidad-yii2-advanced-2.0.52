<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Cursos no aprobados por un estudiante';
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
    <h3>Cursos no aprobados:</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Curso ID</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Créditos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $fila): ?>
                <tr>
                    <td><?= Html::encode($fila['curso_id']) ?></td>
                    <td><?= Html::encode($fila['nombre_del_curso']) ?></td>
                    <td><?= Html::encode($fila['codigo_del_curso']) ?></td>
                    <td><?= Html::encode($fila['creditos_del_curso']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
