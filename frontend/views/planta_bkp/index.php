<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlantaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plantas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Planta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             [

            'attribute'=>'parentid',

            'label'=>'Curso',

            'format'=>'html',//raw, html

            'content'=>function($data){

                return $data->getCodigo($data);

                }

        ],
            //'idCategoria.descripcion',
            //'id',
            'idDedicacion.descripcion',
	'cantidad_dedicaciones',
	'idRevista.revista',
	'cantidad_horas',
             'codigoEspecialidad.nombre',
             'dni0.nombre',
	

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
