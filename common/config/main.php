<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules'=>[
        'auth'=> [
            'class'=>'common\modules\auth\Module',
        ],
        'datecontrol' =>  [
            'class' => '\kartik\datecontrol\Module'
        ],
        //'rbac' => 'dektrium\rbac\RbacWebModule',

        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
           // 'mainLayout' => '@app/views/layouts/main.php',

     ]
    ],

    /*'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
        ]
    ],*/

    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'authManager' => [
            'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
        ]


    ],
];
