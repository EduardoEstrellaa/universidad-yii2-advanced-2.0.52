<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\InscripcionesCursos $model */

$this->title = 'Create Inscripciones Cursos';
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripciones-cursos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
