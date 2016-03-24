<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\EspecialidadesUsuario;
use backend\models\Especialidades;

$this->title = "Planta docente";
$this->params['breadcrumbs'][] = ['label' => 'Plantas', 'url' => ['select']];
$this->params['breadcrumbs'][] = $this->title;

$id = Yii::$app->user->getIdentity()->id;
$model = EspecialidadesUsuario::findAll(['id_usuario'=>$id,'isActive'=>'TRUE']);


?>
<div class="planta-select">
<section class="content">

      <div class="row">
          <?php
          $a = -1; 
          $color[0] = "small-box bg-aqua";
          $color[1] = "small-box bg-green";
          $color[2] = "small-box bg-yellow";
          $color[3] = "small-box bg-red";
          foreach($model as $esp){
    $espe = $esp->id_especialidad;
    $model2 = Especialidades::findAll(['especialidad'=> $espe]);
if(empty($model2)) continue;
              $a = $a + 1;
            if($a==4){
                $a = 0;
            }
          ?>
        <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <div class="<?php echo $color[$a];?>">
            <div class="inner">
              <h3><?php echo $model2[0]->nombre;?></h3>

              <p></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/planta/anio/', 'especialidad' => $model2[0]->especialidad])?>" class="small-box-footer">
              Ingresar <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
<?php
}
?>


        <!-- ./col -->
      </div>
      <!-- /.row -->
</section>
</div>
      