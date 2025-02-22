<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],

    'modules' => [

    //'rbac' => 'dektrium\rbac\RbacConsoleModule',
       /* 'authManager' => [
            'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
        ]*/

],

    'components' => [

    'authManager' => [
    'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
],
    'user' => [
    'class' => 'mdm\admin\models\User',
    'identityClass' => 'mdm\admin\models\User',
    'loginUrl' => ['admin/user/login'],
]
],

    'params' => $params,
];

