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
    'language' =>'fr',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],

    'aliases'=>[
        '@adminlte/widgets'=>'@vendor/adminlte/yii2-widgets',
    ],

    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
        'settings' => [
            'class' => 'backend\modules\settings\Settings',
        ],

        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
        ]

    ],

    'controllerMap' => [
        'assignment' => [
            'class' => 'mdm\admin\controllers\AssignmentController',
            'userClassName' => 'backend\models\User',
            'idField' => 'user_id'
        ],
        'other' => [
            'class' => 'path\to\OtherController', // add another controller
        ],
    ],

    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'formatter' => [
            'thousandSeparator' => ' ',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
// Yii2 TCPDF
        'tcpdf' => [
            'class' => 'cinghie\tcpdf\TCPDF',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ]
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
