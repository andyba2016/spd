<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\BaseUrl;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
           // 'auth_key',
           // 'password_hash',
           // 'password_reset_token',
             'email:email',
             'status',
             'created_at',
             'updated_at',
             'isBasicas:boolean',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {modify}',

            'buttons' => [

                'modify' => function ($url,$model) {


					 return Html::a('<span class="glyphicon glyphicon-user"></span>', $url, [
                        'title' => Yii::t('app', 'Modify'),
					]);
					
					
                },
				'urlCreator' => function ($action, $model, $key, $index) {
					if($action==='modify'){
						return BaseUrl::toRoute([$action, 'id' => $model->id]);					
					}
					
				}

              

            ],

        ],

        ],
    ]); ?>

</div>
