<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\EspecialidadesUsuario;
use backend\models\Especialidades;

$this->title = "Planta docente";
$this->params['breadcrumbs'][] = ['label' => 'Plantas', 'url' => ['select']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="planta-select">
<section class="content">

      <div class="row">
    <?php
          $amax = date('Y');
          $a = -1; 
          $color[0] = "small-box bg-aqua";
          $color[1] = "small-box bg-green";
          $color[2] = "small-box bg-yellow";
          for($i=2015;$i<=$amax;$i++){
              $a = $a + 1;
              if($a==3){
                  $a = 0;
              }
          ?>
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          
          <div class="<?php echo $color[$a];?>">
            <div class="inner">
              <h3><?php echo $i;?></h3>

              <p></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/planta/index/', 'especialidad' => $params['especialidad'], 'anio'=> $i])?>" class="small-box-footer">
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
      