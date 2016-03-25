<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Especialidades;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Materias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="materias-form">
<?php

$modelo = Especialidades::find()->all();
$listData=ArrayHelper::map($modelo,'especialidad','nombre');
?>
    <?php $form = ActiveForm::begin(); ?>

    <?php
        echo $form->field($model, 'especialidad')->dropDownList($listData,['prompt'=>'Seleccione']);
    ?>

    <?= $form->field($model, 'plan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'isBasicas')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
