<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Pagos $model */

$this->title = $model->pago_id;
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pagos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pago_id' => $model->pago_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pago_id' => $model->pago_id], [
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
            'pago_id',
            'estudiante_id',
            'monto',
            'fecha_pago',
            'concepto',
            'metodo_pago',
            'estado',
            'semestre_id',
        ],
    ]) ?>

</div>
