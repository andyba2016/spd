<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CursosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cursos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_materia') ?>

    <?= $form->field($model, 'anio') ?>

    <?= $form->field($model, 'anio_academico') ?>

    <?= $form->field($model, 'comision') ?>

    <?= $form->field($model, 'cantidad_alumnos') ?>

    <?php // echo $form->field($model, 'id') ?>

    <?php // echo $form->field($model, 'codigo_especialidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Borrar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
