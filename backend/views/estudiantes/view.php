<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Estudiantes $model */

$this->title = $model->nombre . ' ' . $model->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="estudiantes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // Mostrar mensaje flash de éxito 
    ?>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> ¡Éxito!</h5>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <p>
        <?= Html::a('Actualizar', ['update', 'estudiante_id' => $model->estudiante_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'estudiante_id' => $model->estudiante_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de que quieres eliminar este estudiante?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'estudiante_id',
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'genero',
            'direccion',
            'telefono',
            'email:email',
            'fecha_ingreso',
            'estado',
        ],
    ]) ?>

</div>