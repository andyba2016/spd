<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'Archivo')->fileInput() ?>

    <button>Enviar</button>

<?php ActiveForm::end() ?>


