<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'es',
    'modules' => [],
	'name'=>'UTN',

    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
        ],
   'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@vendor/almasaeed2010/adminlte/pages'
             ],
         ],
    ], 

//           'view' => [
//         'theme' => [
//             'pathMap' => [
//                '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
//            ],
//         ],
//    ],

	'assetManager' => [
            'linkAssets' => true,
        'bundles' => [
            'dmstr\web\AdminLteAsset' => [
                'skin' => 'skin-blue',
            ],
        ],
   	],
        
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
	'urlManager' => [
        'class' => 'yii\web\UrlManager',
        // Disable index.php
        'showScriptName' => false,
        // Disable r= routes
        'enablePrettyUrl' => true,
        'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        ),
        ],
    ],


'as beforeRequest' => [
'class' => 'yii\filters\AccessControl',
'rules' => [
[
'actions' => ['login', 'error'],
'allow' => true,
],
[

'allow' => true,
'roles' => ['@'],
],
],
], 


    'params' => $params,
];
