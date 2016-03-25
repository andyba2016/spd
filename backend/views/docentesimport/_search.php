<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DocentesImportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docentes-import-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dni') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'legajo') ?>

    <?= $form->field($model, 'fecha_nacimiento') ?>

    <?= $form->field($model, 'isActive')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
