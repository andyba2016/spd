<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Especialidades;
use backend\models\Dedicaciones;
use backend\models\Docentes;
use backend\models\Cursos;
use backend\models\Categorias;
use backend\models\EspecialidadesUsuario;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Planta */
/* @var $form yii\widgets\ActiveForm */




//$modelo = Especialidades::find()->orderBy('nombre')->all();
$id_usuario = Yii::$app->user->id;
$modelo = Yii::$app->db->createCommand('select * from especialidades '
        . 'inner join especialidades_usuario on '
        . 'especialidades.especialidad=especialidades_usuario.id_especialidad where id_usuario='.$id_usuario)->query();
$listDataEspecialidad=ArrayHelper::map($modelo,'especialidad','nombre');

$modelo = Dedicaciones::find()->orderBy('descripcion')->all();
$listDataDedicaciones=ArrayHelper::map($modelo,'id','descripcion');

$modelo = Docentes::find()->orderBy('nombre')->all();
$listDataDocentes=ArrayHelper::map($modelo,'dni','nombre');

$modelo = Cursos::find()->all();
$listDataCursos=ArrayHelper::map($modelo,'id','description');


$modelo = Categorias::find()->all();
$listDataCategorias=ArrayHelper::map($modelo,'id','descripcion');


?>

<div class="planta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dni')->dropDownList($listDataDocentes,['prompt'=>'Seleccione'])?>   
 
    <?= $form->field($model, 'id_curso')->dropDownList($listDataCursos,['prompt'=>'Seleccione'])?>

    <?= $form->field($model, 'id_categoria')->dropDownList($listDataCategorias,['prompt'=>'Seleccione']) ?>

    
    <?= $form->field($model, 'id_dedicacion')->dropDownList($listDataDedicaciones,['prompt'=>'Seleccione'])?>

    <?= $form->field($model, 'codigo_especialidad')->dropDownList($listDataEspecialidad,['prompt'=>'Seleccione'])?>


    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
