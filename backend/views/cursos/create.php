<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cursos */


//CORBI 14/09/2015 - Crear en lugar de Create
$this->title = 'Crear Cursos';
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
