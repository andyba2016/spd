<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Especialidades */

$this->title = 'Crear Especialidades';
$this->params['breadcrumbs'][] = ['label' => 'Especialidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="especialidades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
