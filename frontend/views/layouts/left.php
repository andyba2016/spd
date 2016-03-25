<?php
use yii\bootstrap\Nav;
$userImage="/planta/photos/".Yii::$app->user->getIdentity()->id.".jpg";


 if(!file_exists('file:///var/www' . $userImage)) {

$userImage = $directoryAsset."/img/user2-160x160.jpg";

 }

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $userImage ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->getIdentity()->username?></p>



                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>



        <?=
        Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    '<li class="header">Menu</li>',

                    [
                        'label' => '<i class="glyphicon glyphicon-lock"></i><span>Sing in</span>', //for basic
                        'url' => ['/site/login'],
                        'visible' =>Yii::$app->user->isGuest
                    ],
                ],
            ]
        );
        ?>

        <ul class="sidebar-menu">
            <li class="treeview">
		<li><a href="<?= \yii\helpers\Url::to(['/planta/select']) ?>"><span class="fa fa-file-code-o"></span> Planta</a></li>

              </li>

        </ul>
            
     

    </section>

</aside>
