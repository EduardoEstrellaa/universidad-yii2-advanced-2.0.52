<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\InscripcionesCursos $model */

$this->title = 'Update Inscripciones Cursos: ' . $model->inscripcion_id;
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inscripcion_id, 'url' => ['view', 'inscripcion_id' => $model->inscripcion_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inscripciones-cursos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
