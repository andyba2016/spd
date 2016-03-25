<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\Especialidades;
use yii\helpers\ArrayHelper;


$this->title = 'Carreras usuario';
$this->params['breadcrumbs'][] = "Carreras usuario";
?>

<?php

$modelo = Especialidades::find()->orderBy('nombre')->all();

foreach($model as $ocurrence){
	$selected[$ocurrence['id_especialidad']] =1;	
}



?>
</pre>


<div class="site-signup">
    <h1><?= Html::encode($this->title).": ".$usuario->username ?></h1>

    <p>Por favor seleccione las carreras a las que tendra acceso el usuario:</p>

    <div class="row">
        <div class="col-lg-5">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
                  <label>Carreras</label>
                  <select multiple="" class="form-control" id='id_especialidad' name='id_especialidad[]'>
                  <?php
                  foreach($modelo as $mod){
                      $select="none";
                      if(isset($selected[$mod['especialidad']])){
                          $select="selected='selected'";
                      }
                    echo "<option value='".$mod['especialidad']."' ".$select.">".$mod['nombre']."</option>";
                  }
                  ?>  
                  </select>
                  <input type='hidden' id='id_usuario' name='id_usuario' value='<?php echo $id;?>'></input>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>




    <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>