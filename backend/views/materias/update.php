<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materias */

$this->title = 'Actualizar Materias: ' . ' ' . $model->especialidad;
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->especialidad, 'url' => ['view', 'especialidad' => $model->especialidad, 'plan' => $model->plan, 'codigo' => $model->codigo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="materias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
