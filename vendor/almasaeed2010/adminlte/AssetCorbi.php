<?php


namespace corbi;

use yii\web\AssetBundle;



class AssetCorbi extends AssetBundle
{


    public $sourcePath = '@corbi/plugins';


    public $css = [
        'datatables/dataTables.bootstrap.css',
	'iCheck/flat/blue.css',
	'bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
	'select2/select2.min.css',

    ];


    public $js = [
        'datatables/jquery.dataTables.min.js',
        'datatables/dataTables.bootstrap.min.js',
        'iCheck/icheck.min.js',
        'bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
	'select2/select2.min.js'




    ];


    public $depends = [
        'yii\web\YiiAsset',

    ];


}
