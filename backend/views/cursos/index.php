<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CursosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Cursos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_materia',
            'anio',
            'anio_academico',
            'comision',
            'cantidad_alumnos',
            // 'id',
            // 'codigo_especialidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
