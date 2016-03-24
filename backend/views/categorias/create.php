<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Categorias */


//CORBI 14/09/2015 - Crear en lugar de Create
$this->title = 'Crear Categorias';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
