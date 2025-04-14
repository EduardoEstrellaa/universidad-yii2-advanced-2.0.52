<?php

use backend\models\Estudiantes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\EstudiantesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Estudiantes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'estudiante_id',
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'genero',
            //'direccion',
            //'telefono',
            //'email:email',
            //'fecha_ingreso',
            //'estado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Estudiantes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'estudiante_id' => $model->estudiante_id]);
                 }
            ],
        ],
    ]); ?>


</div>
