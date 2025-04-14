<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Pagos $model */

$this->title = 'Update Pagos: ' . $model->pago_id;
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pago_id, 'url' => ['view', 'pago_id' => $model->pago_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pagos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
