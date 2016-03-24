<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Modificar perfil: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';

?>

<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="user-form">


	     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


		
		
		
		<?= $form->field($model, 'username') ?>
		<?= $form->field($model, 'email') ?>
		<? /*= $form->field($model, 'password')->passwordInput()*/ ?>
		


		<?= $form->field($model, 'imageFile')->fileInput()?>

		
		


		
		
		<div class="form-group">
			<?= Html::submitButton('Actualizar', ['class' => 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>
</div>
