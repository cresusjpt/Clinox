<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=db_barakate',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],

        'authManager' => [
            //'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
            'class' => 'dektrium\rbac\components\DbManager',

        ],

       /* 'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
        ],*/
    ],

];
