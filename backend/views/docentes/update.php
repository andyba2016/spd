<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Docentes */

$this->title = 'Actualizar Docentes: ' . ' ' . $model->dni;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dni, 'url' => ['view', 'id' => $model->dni]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="docentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
