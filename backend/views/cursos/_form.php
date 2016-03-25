<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Materias;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Cursos */
/* @var $form yii\widgets\ActiveForm */

//$modelo = Materias::find()->all();
$id_usuario = Yii::$app->user->id;
$modelo = Yii::$app->db->createCommand('select materias.id as id,materias.nombre as nombre,especialidades.nombre as nombre_esp from materias inner join especialidades on materias.especialidad = especialidades.especialidad '
        . 'inner join especialidades_usuario on '
        . 'especialidades.especialidad=especialidades_usuario.id_especialidad where id_usuario='.$id_usuario)->query();
$listData=ArrayHelper::map($modelo,'id','nombre','nombre_esp');


$modelo = Materias::find()->all();
$listDataEspecialidad=ArrayHelper::map($modelo,'especialidad','nombre');


?>

<div class="cursos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_materia')->dropDownList($listData,['prompt'=>'Seleccione']); ?>

    <?= $form->field($model, 'anio')->textInput() ?>

    <?= $form->field($model, 'anio_academico')->textInput() ?>

    <?= $form->field($model, 'comision')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantidad_alumnos')->textInput() ?>

    <? //$form->field($model, 'codigo_especialidad')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
