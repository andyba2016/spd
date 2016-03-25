<!-- FLOT CHARTS -->
<script src="../../../vendor/almasaeed2010/adminlte/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../../../vendor/almasaeed2010/adminlte/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../../../vendor/almasaeed2010/adminlte/plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="../../../vendor/almasaeed2010/adminlte/plugins/flot/jquery.flot.categories.min.js"></script>
<!-- Page script -->

<?php
if(isset($cantidad)){
    ?>

<script>
    $( document ).ready(function() {
        
    function labelFormatter(label, series) {
    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>"+label+"<br/></div>";
}    
        
    var donutData = [
      {label: "Correctas", data: <?php echo $cantidad;?>, color: "#3c8dbc"},
      {label: "Incorrectas", data: <?php echo 100 - $cantidad;?>, color: "#0073b7"},
    ];
    $.plot("#donut-chart", donutData, {
      series: {
        pie: {
          show: true,
          radius: 1,
          innerRadius: 0.5,
          label: {
            show: true,
            radius: 2 / 3,
 formatter: function (label, series) {
                        return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>'+Math.round(series.percent)+'% </div>';

                    },           

/* formatter: labelFormatter,*/
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    });
    });
    
</script>
<?php
}
?>



<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\DocentesImport */


//CORBI 14/09/2015 - Crear en lugar de Create
$this->title = 'Importar docentes';
$this->params['breadcrumbs'][] = ['label' => 'Importar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

if(isset($cantidad)){
    
    //echo "<pre>";
    //echo $cantidad;
    //echo "</pre>";
    ?>

    <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Importacion de archivo</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="donut-chart" style="height: 300px; padding: 0px; position: relative;">
                </div>
            </div>
            <!-- /.box-body-->
          </div>

          <?php
              if(isset($mal)){
                  
                  ?>
          
            <div class="box-header">
              <h3 class="box-title">Errores</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Linea</th>
                  <th style="width: 40px">Detalle</th>
                </tr>
                <?php
                $cant = 0;
                foreach($mal as $m){
                    $cant = $cant + 1;
                ?>
                <tr>
                  <td><?php echo $cant;?></td>
                  <td><?php echo $m;?></td>

                  <td><span class="badge bg-red">ERROR</span></td>
                </tr>
                <?php
                }
                ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          



    <?php

   
    }
    
    
}else{

?>
<div class="docentes-import-create">

    <h1><?= Html::encode($this->title) ?></h1>

   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>
    
    <button>Submit</button>

<?php ActiveForm::end() ?>

</div>

<?php

}

?>


