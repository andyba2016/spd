<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlantaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_curso') ?>

    <?= $form->field($model, 'id_categoria') ?>


    <?= $form->field($model, 'id') ?>

    <?php // echo $form->field($model, 'id_dedicacion') ?>

    <?php // echo $form->field($model, 'codigo_especialidad') ?>

    <?php // echo $form->field($model, 'dni') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
