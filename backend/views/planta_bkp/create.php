<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Planta */


//CORBI 14/09/2015 - Crear en lugar de Create
$this->title = 'Crear Planta';
$this->params['breadcrumbs'][] = ['label' => 'Plantas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
