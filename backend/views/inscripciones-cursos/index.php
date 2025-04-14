<?php

use backend\models\InscripcionesCursos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\InscripcionesCursosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Inscripciones Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripciones-cursos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Inscripciones Cursos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'inscripcion_id',
            'estudiante_id',
            'horario_id',
            'calificacion_final',
            'estado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, InscripcionesCursos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'inscripcion_id' => $model->inscripcion_id]);
                 }
            ],
        ],
    ]); ?>


</div>
