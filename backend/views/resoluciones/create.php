<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Resoluciones */


//CORBI 14/09/2015 - Crear en lugar de Create
$this->title = 'Crear Resoluciones';
$this->params['breadcrumbs'][] = ['label' => 'Resoluciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resoluciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
