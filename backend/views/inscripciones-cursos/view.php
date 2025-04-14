<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\InscripcionesCursos $model */

$this->title = $model->inscripcion_id;
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inscripciones-cursos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'inscripcion_id' => $model->inscripcion_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'inscripcion_id' => $model->inscripcion_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'inscripcion_id',
            'estudiante_id',
            'horario_id',
            'calificacion_final',
            'estado',
        ],
    ]) ?>

</div>
