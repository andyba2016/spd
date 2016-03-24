<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Planta */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Plantas', 'url' => ['index','anio'=>$_REQUEST['anio'],'especialidad'=>$_REQUEST['especialidad']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planta-view">

    <h1><?= Html::encode($this->title) ?></h1>
<!--CORBI 14/09/2015 --- quizas haya que tocar esto-->
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id,'anio'=>$_REQUEST['anio'],'especialidad'=>$_REQUEST['especialidad'] ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id,'anio'=>$_REQUEST['anio'],'especialidad'=>$_REQUEST['especialidad']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de que desea eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_curso',
            'id_categoria',
            'id',
            'id_dedicacion',
            'codigo_especialidad',
            'dni',
        ],
    ]) ?>

</div>
