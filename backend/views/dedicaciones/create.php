<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dedicaciones */


//CORBI 14/09/2015 - Crear en lugar de Create
$this->title = 'Crear Dedicaciones';
$this->params['breadcrumbs'][] = ['label' => 'Dedicaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dedicaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
