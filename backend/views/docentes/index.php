<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocentesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Docentes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dni',
            'nombre',
            'legajo',
            'fecha_nacimiento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
