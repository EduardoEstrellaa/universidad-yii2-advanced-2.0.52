<?php

use yii\helpers\Html;
use yii\helpers\Json;

/** @var yii\web\View $this */
/** @var backend\models\InscripcionesCursos $model */
/** @var string|null $error */
/** @var array|null $logData */

$this->title = 'Create Inscripciones Cursos';
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripciones-cursos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <strong>Error:</strong> <?= Html::encode($error) ?>

            <?php if (isset($logData) && $logData): ?>
                <div class="mt-3">
                    <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#errorDetails" aria-expanded="false" aria-controls="errorDetails">
                        Ver detalles
                    </button>
                    <div class="collapse" id="errorDetails">
                        <div class="card mt-2">
                            <div class="card-body" style="background-color: #2c3e50; color: white;">
                                <p><strong>Acción:</strong> <?= Html::encode($logData['accion_realizada']) ?></p>
                                <p><strong>Mensaje:</strong> <?= Html::encode($logData['mensaje']) ?></p>
                                <p><strong>Fecha:</strong> <?= Html::encode($logData['fecha_hora']) ?></p>
                                
                                <?php $datos = json_decode($logData['datos_nuevos'], true); ?>
                                <?php if (is_array($datos)): ?>
                                    <div class="mt-2">
                                        <strong>Datos:</strong>
                                        <ul class="list-unstyled">
                                            <?php foreach ($datos as $key => $value): ?>
                                                <li><strong><?= Html::encode($key) ?>:</strong> <?= Html::encode(is_array($value) ? json_encode($value) : $value) ?></li>
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

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>