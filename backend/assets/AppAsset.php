<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
//    public $sourcePath = '@vendor/almasaeed2010/adminlte/';
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
//	'css/AdminLTE.min.css',
//	'plugins/datatables/dataTables.bootstrap.css',

    ];
    public $js = [
//        'js/app.min.js'
//        'plugins/datatables/dataTables.bootstrap.min.js'


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
//        'yii\bootstrap\BootstrapPluginAsset',

    ];
    
    public $jsOptions = array(
    'position' => \yii\web\View::POS_HEAD
);
}
