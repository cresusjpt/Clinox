<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name' => 'La Barakat',
    'basePath' => dirname(__DIR__),
    'language' =>'fr',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'aliases'=>[
        '@adminlte/widgets'=>'@vendor/adminlte/yii2-widgets'
    ],
    'modules' => [
    'auth'=>[
        'class'=>'backend\modules\auth\Auth',

        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu', // it can be '@path/to/your/layout'.
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
//                    'userClassName' => 'common\models\User',
                    'idField' => 'id',
                    'usernameField' => 'username',
//                    'fullnameField' => 'profile.full_name',
                ],


                'searchClass' => 'app\models\UserSearch'

            ],
            'menus' => [
                'assignment' => [
                    'label' => 'Grand Access' // change label
                ],
                //'route' => null, // disable menu route
            ]
        ],
    ]

       /*'admin'=>[
            'class'=>'backend\modules\admin\Module'
        ]*/,
        'rbac' => [
            'class' => 'mdm\admin\Module',
            ],
        'as access' => [
            'class' => 'mdm\admin\components\AccessControl',
            'allowActions' => [
                'site/*',
               'admin/*',
               'rbac/*',
               'post/index',

            ]
        ],



    ],

    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],


        'user' => [
            'identityClass' => 'mdm\admin\models\User',
            'loginUrl' => ['rbac\user\login'], // connexion user à revoir si ça pête

        ],

        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],*/
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





    ],
    'params' => $params,
];
