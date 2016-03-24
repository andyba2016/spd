<?
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use backend\models\User;
use backend\models\UserSearch;
use yii\helpers\ArrayHelper;
$data = User::find()->orderBy('email')->all();
$listUsers=ArrayHelper::map($data ,'id','email');

$this->title = 'Mensajes';
$this->params['breadcrumbs'][] = $this->title;

?>

<section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="./" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>

          <div class="box box-solid">
            <div class="box-header with-border">
             <h3 class="box-title">Carpetas</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Bandeja de entrada
                  <span class="label label-primary pull-right">12</span></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> Enviados</a></li>
                <li><a href="#"><i class="fa fa-file-text-o"></i> Borradores</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Papelera</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>


        </div>
        <!-- /.col -->

    <?php $form = ActiveForm::begin(); ?>

        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">

    <?= $form->field($model, 'recipient')->dropDownList($listUsers,['prompt'=>'Para:']);?>   

<!--
$(".js-example-basic-multiple-limit").select2({
  maximumSelectionLength: 2
});
-->


              </div>
              <div class="form-group">


   <?= $form->field($model, 'title')->input('string')?>



              </div>
              <div class="form-group">
			  
			<!--  <textarea id="compose-textarea" class="form-control" style="height: 300px; "></textarea> 
-->

   <?= $form->field($model, 'content')->textarea(['id'=>'compose-textarea','class'=>'form-control','style=heicht:300 px'])?>


        
			  </div>
			  
			  <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="submit" name="borrador" class="btn btn-default"><i class="fa fa-pencil"></i> Borrador</button>



                <button type="submit" name="enviar" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>



              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
            </div>
            <!-- /.box-footer -->

    <?php ActiveForm::end(); ?>

          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div></div></section>