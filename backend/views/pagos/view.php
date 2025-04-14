<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Pagos $model */

$this->title = 'Pago #' . $model->pago_id;
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> ¡Éxito!</h5>
            <?= Yii::$app->session->getFlash('success') ?>


        </div>
    <?php endif; ?>

    <p>
        <?= Html::a('Actualizar', ['update', 'pago_id' => $model->pago_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'pago_id' => $model->pago_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de que quieres eliminar este pago?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pago_id',
            'estudiante_id',
            [
                'attribute' => 'monto',
                'value' => function ($model) {
                    return '$' . number_format($model->monto, 2);
                }
            ],
            'fecha_pago',
            [
                'attribute' => 'concepto',
                'value' => function ($model) {
                    return $model::getOpcionesConcepto()[$model->concepto];
                }
            ],
            [
                'attribute' => 'metodo_pago',
                'value' => function ($model) {
                    return $model::getOpcionesMetodoPago()[$model->metodo_pago];
                }
            ],
            [
                'attribute' => 'estado',
                'value' => function ($model) {
                    return $model::getOpcionesEstado()[$model->estado];
                }
            ],
            'semestre_id',
        ],
    ]) ?>

</div>