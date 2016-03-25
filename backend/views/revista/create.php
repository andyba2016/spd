<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Revista */


//CORBI 14/09/2015 - Crear en lugar de Create
$this->title = 'Crear Revista';
$this->params['breadcrumbs'][] = ['label' => 'Revistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
