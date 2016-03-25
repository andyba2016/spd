<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resoluciones */

$this->title = 'Actualizar Resoluciones: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Resoluciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="resoluciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
