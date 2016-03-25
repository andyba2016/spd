<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DocentesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docentes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dni') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'legajo') ?>

    <?= $form->field($model, 'fecha_nacimiento') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Borrar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
