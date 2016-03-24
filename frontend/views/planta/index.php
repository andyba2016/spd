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

    <?php
    
    if(isset($mensaje)){
        ?>
    <div class="alert alert-warning alert-dismissible">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                <?php echo $mensaje; ?>
              </div>
    
    <?
    }
    
    ?>
    <p>

        
        

        <?= Html::a('Crear Planta', ['planta/create?anio='.$anio.'&especialidad='.$_REQUEST['especialidad']], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Exportar a CSV', ['planta/export?anio='.$anio.'&especialidad='.$_REQUEST['especialidad']], ['class' => 'btn btn-info']) ?>
        <?php
        if($dataProvider->getTotalCount()==0){
        ?>
        <?= Html::a('Duplicar planta a&ntilde;o anterior', ['planta/duplicate?anio='.$anio.'&especialidad='.$_REQUEST['especialidad']], ['class' => 'btn btn-danger']) ?>
        <?php
        }
        ?>
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
                
             [

            'attribute'=>'parentid',

            'label'=>'Dedicacion',

            'format'=>'html',//raw, html

            'content'=>function($data){

                return $data->getDedicacion($data);

                }

        ],
            //'idCategoria.descripcion',
            //'id',
            'idDedicacion.descripcion',               
             'codigoEspecialidad.nombre',
             'dni0.nombre',
         [

            'attribute'=>'parentid',

            'label'=>'Estado',

            'format'=>'html',//raw, html

            'content'=>function($data){

                return $data->getEstado($data);

                }

        ],

            ['class' => 'yii\grid\ActionColumn' , 'template' => '{view} {update} {delete}',
				'urlCreator' => function ($action, $model, $key, $index) {
					return BaseUrl::toRoute([$action, 'id' => $model->id, 'anio'=>$_REQUEST['anio'],'especialidad'=>$_REQUEST['especialidad']]);					

				}
			],
        ],
    ]); ?>

</div>


