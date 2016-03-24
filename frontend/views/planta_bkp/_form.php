<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Especialidades;
use backend\models\Dedicaciones;
use backend\models\Docentes;
use backend\models\Cursos;
use backend\models\Categorias;
use backend\models\EspecialidadesUsuario;
use backend\models\Revista;
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


foreach($modelo as $clave=>$singleModel){
	$modelo_ddl[$clave]['id']=$singleModel['id'];
	$modelo_ddl[$clave]['description']=$singleModel['description']." | Comision: ".$singleModel['comision']." | Cant de alumnos: ".$singleModel['cantidad_alumnos']." | Materia: ".$singleModel['idMateria']['nombre'];
	$modelo_ddl[$clave]['order']=$singleModel['idMateria']['nombre'];
	$sort_array[$clave]=$singleModel['idMateria']['nombre'];

}


ArrayHelper::multisort($modelo_ddl, ['order'], [SORT_ASC]);




$listDataCursos=ArrayHelper::map($modelo_ddl,'id','description');

$modelo = Categorias::find()->all();
$listDataCategorias=ArrayHelper::map($modelo,'id','descripcion');


$modelo = Revista::find()->all();
$listDataRevista=ArrayHelper::map($modelo,'id','revista');


$array = [
    ['id' => '0.5', 'data' => '0.5'],
    ['id' => '1', 'data' => '1'],
    ['id' => '1.5', 'data' => '1.5'],
    ['id' => '2', 'data' => '2'],
];
$listDataCantDedicaciones=ArrayHelper::map($array ,'id','data');



$array = [
    ['id' => '1', 'data' => '1'],
    ['id' => '2', 'data' => '2'],
    ['id' => '3', 'data' => '3'],
    ['id' => '4', 'data' => '4'],
    ['id' => '5', 'data' => '5'],
    ['id' => '6', 'data' => '6'],
];
$listDataHoras=ArrayHelper::map($array ,'id','data');



?>

<div class="planta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dni')->dropDownList($listDataDocentes,['prompt'=>'Seleccione'])?>   
 
    <?= $form->field($model, 'id_curso')->dropDownList($listDataCursos,['prompt'=>'Seleccione'])?>

    <?= $form->field($model, 'id_categoria')->dropDownList($listDataCategorias,['prompt'=>'Seleccione']) ?>

    
    <?= $form->field($model, 'id_dedicacion')->dropDownList($listDataDedicaciones,['prompt'=>'Seleccione'])?>

    <?= $form->field($model, 'codigo_especialidad')->dropDownList($listDataEspecialidad,['prompt'=>'Seleccione'])?>

    <?= $form->field($model, 'id_revista')->dropDownList($listDataRevista,['prompt'=>'Seleccione'])?>

    <?= $form->field($model, 'cantidad_dedicaciones')->dropDownList($listDataCantDedicaciones,['prompt'=>'Seleccione'])?>

    <?= $form->field($model, 'cantidad_horas')->dropDownList($listDataHoras,['prompt'=>'Seleccione'])?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
