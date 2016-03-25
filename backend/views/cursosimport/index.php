<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocentesImportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docentes Imports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentes-import-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Importar Docentes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



</div>
