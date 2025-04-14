<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;

/** @var yii\web\View $this */
/** @var backend\models\Estudiantes $model */
/** @var string|null $error */
/** @var string|null $resultado */
/** @var array|null $logData */

$this->title = 'Registrar Nuevo Estudiante';
?>

<div class="estudiantes-form">

    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <strong>Error:</strong> <?= Html::encode($error) ?>

            <?php if (isset($resultado)): ?>
                <div class="mt-2"><strong>Detalle:</strong> <?= Html::encode($resultado) ?></div>
            <?php endif; ?>

            <?php if (isset($logData) && $logData): ?>
                <div class="mt-3">
                    <h5>Información detallada del error:</h5>
                    <!-- Botón para expandir los detalles -->
                    <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#errorDetails" aria-expanded="false" aria-controls="errorDetails">
                        Ver detalles
                    </button>
                    <div class="collapse" id="errorDetails">
                        <div class="card mt-2">
                            <div class="card-body" style="background-color: #2c3e50; color: white;">
                                <p><strong>Mensaje completo:</strong> <?= Html::encode($logData['mensaje']) ?></p>
                                <p><strong>Fecha y hora:</strong> <?= Html::encode($logData['fecha_hora']) ?></p>

                                <?php
                                $datos = json_decode($logData['datos_nuevos'], true);
                                if (is_array($datos)): ?>
                                    <div class="mt-2">
                                        <strong>Datos enviados:</strong>
                                        <ul class="list-unstyled">
                                            <?php foreach ($datos as $key => $value): ?>
                                                <?php if (!empty($value) && $value !== 'NULL'): ?>
                                                    <li><strong><?= Html::encode($key) ?>:</strong> <?= Html::encode(is_array($value) ? json_encode($value) : $value) ?></li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

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

<!-- Asegúrate de tener el archivo JS de Bootstrap cargado -->
<?php $this->registerJsFile('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', ['position' => \yii\web\View::POS_END]); ?>