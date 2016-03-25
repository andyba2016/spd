<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DocentesImport */

$this->title = 'Actualizar Docentes Import: ' . ' ' . $model->dni;
$this->params['breadcrumbs'][] = ['label' => 'Docentes Imports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dni, 'url' => ['view', 'id' => $model->dni]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="docentes-import-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
