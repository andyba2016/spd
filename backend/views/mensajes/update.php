<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Mensajes */

$this->title = 'Actualizar Mensajes: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Mensajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="mensajes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
