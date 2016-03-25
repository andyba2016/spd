<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Especialidades;
use backend\models\Dedicaciones;
use backend\models\Docentes;
use backend\models\Cursos;
use backend\models\Revista;
use backend\models\Resoluciones;

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

//$modelo = Cursos::find()->andFilterWhere(['anio_academico'=>$_REQUEST['anio'],'codigo_especialidad'=>$_REQUEST['especialidad']])
//->andWhere('exists (select 1 from materias where materias.id=cursos.id_materia and materias."isActive"=true and materias."isBasicas"='.$flag.")")->all();
   
$modelo = Revista::find()->orderBy('revista')->all();
$listRevista=ArrayHelper::map($modelo,'id','revista');

$modelo = Resoluciones::find()->orderBy('id')->all();
$listResoluciones=ArrayHelper::map($modelo,'id','nombre');

$modelo = Cursos::find()->andFilterWhere(['anio_academico'=>$_REQUEST['anio'],'codigo_especialidad'=>$_REQUEST['especialidad']])->all();


$modelo_ddl="";

foreach($modelo as $clave=>$singleModel){
	$modelo_ddl[$clave]['id']=$singleModel['id'];
	$modelo_ddl[$clave]['description']=$singleModel['description']." | Comision: ".$singleModel['comision']." | Cant de alumnos: ".$singleModel['cantidad_alumnos']." | Materia: ".$singleModel['idMateria']['nombre'];
}


if($modelo_ddl!=""){
  $listDataCursos=ArrayHelper::map($modelo_ddl,'id','description');
}else{
  $listDataCursos['id']="No disponible";
}



$modelo = Categorias::find()->all();
$listDataCategorias=ArrayHelper::map($modelo,'id','descripcion');


?>

<div class="planta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dni')->dropDownList($listDataDocentes,['prompt'=>'Seleccione'])?>   
 
    <?= $form->field($model, 'id_curso')->dropDownList($listDataCursos,['prompt'=>'Seleccione'])?>

    <?= Html::hiddenInput('Planta[codigo_especialidad]', $_REQUEST['especialidad']);?>
    
    <?= $form->field($model, 'id_categoria')->dropDownList($listDataCategorias,['prompt'=>'Seleccione']) ?>

    <?= $form->field($model, 'id_dedicacion')->dropDownList($listDataDedicaciones,['prompt'=>'Seleccione'])?>
   <?= $form->field($model, 'cantidad_dedicaciones')->input('numeric')?>
    <?= $form->field($model, 'cantidad_horas')->input('numeric')?>
    <?= $form->field($model, 'id_revista')->dropDownList($listRevista,['prompt'=>'Seleccione'])?>
    <?= $form->field($model, 'id_resolucion')->dropDownList($listResoluciones,['prompt'=>'Seleccione'])?>
    <?= $form->field($model, 'numero_resolucion')->input('string')?>
   
    
    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
