<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Estudiantes $model */

$this->title = $model->estudiante_id;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="estudiantes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'estudiante_id' => $model->estudiante_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'estudiante_id' => $model->estudiante_id], [
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
