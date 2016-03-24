<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Planta */

$this->title = 'Actualizar Planta: ' . ' ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Plantas', 'url' => ['index']];


$this->params['breadcrumbs'][] = ['label' => 'Plantas', 'url' => ['index','anio'=>$_REQUEST['anio'],'especialidad'=>$_REQUEST['especialidad']]];



//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];



$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="planta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
