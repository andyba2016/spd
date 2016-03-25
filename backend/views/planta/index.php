<?php

use yii\helpers\Html;
use yii\helpers\BaseUrl;

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

        <?= Html::a('Crear Planta', ['planta/create?anio='.$anio.'&especialidad='.$_REQUEST['especialidad']], ['class' => 'btn btn-success']) ?>
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
             'codigoEspecialidad.nombre',
             'dni0.nombre',

            ['class' => 'yii\grid\ActionColumn' , 'template' => '{view} {update} {delete}',
				'urlCreator' => function ($action, $model, $key, $index) {
					return BaseUrl::toRoute([$action, 'id' => $model->id, 'anio'=>$_REQUEST['anio'],'especialidad'=>$_REQUEST['especialidad']]);					

				}
			],
        ],
    ]); ?>

</div>


