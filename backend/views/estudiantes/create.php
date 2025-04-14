<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Estudiantes $model */

$this->title = 'Create Estudiantes';
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'error' => $error,
        'resultado' => $resultado
    ]) ?>

</div>