<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Estudiantes $model */

$this->title = 'Update Estudiantes: ' . $model->estudiante_id;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->estudiante_id, 'url' => ['view', 'estudiante_id' => $model->estudiante_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estudiantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
