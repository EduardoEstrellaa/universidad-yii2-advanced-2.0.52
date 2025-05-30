<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Pagos $model */

$this->title = 'Create Pagos';
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'error' => $error,
        'resultado' => $resultado
    ]) ?>

</div>
