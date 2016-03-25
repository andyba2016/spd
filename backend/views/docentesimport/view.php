<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DocentesImport */

$this->title = $model->dni;
$this->params['breadcrumbs'][] = ['label' => 'Docentes Imports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentes-import-view">

    <h1><?= Html::encode($this->title) ?></h1>
<!--CORBI 14/09/2015 --- quizas haya que tocar esto-->
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->dni], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->dni], [
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
            'dni',
            'nombre',
            'legajo',
            'fecha_nacimiento',
            'isActive:boolean',
        ],
    ]) ?>

</div>
