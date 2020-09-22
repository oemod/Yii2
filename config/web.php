<?php

$params = require(__DIR__ . '/params.php');
$db = require __DIR__ . '/db.php';
$namkhoa = require __DIR__ . '/namkhoa.php';
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    //'bootstrap' => ['log'],
    'bootstrap' => ['gii'],
    'language' => 'vi-VN',
    'sourceLanguage' => 'vi',
    'timeZone' => 'Asia/Ho_Chi_Minh',
    //  'homeUrl'=>'/basic',
    'defaultRoute' => 'fontend/default/index',
//    ['catAll']=>['backend/user/index'],

    'bootstrap' => ['devicedetect'],
    'components' => [
        'devicedetect' => [
            'class' => 'alexandernst\devicedetect\DeviceDetect'
        ],

       'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                    'clientId' => '476927825842888',
                    'clientSecret' => 'cd6bf1330b07da4e236c47a37aac0ed2',
                ],
            ],
        ],

        'request' => [
            //config host
          //  'baseUrl' => $baseUrl,
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'akZEZqxGC6T0wByyllGkBJza8bx9o0jp',

        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'cache' => [
//            'class' => 'yii\caching\MemCache',
//            'servers' => [
//                [
//                    'host' => 'server1',
//                    'port' => 11211,
//                    'weight' => 100,
//                ],
//                [
//                    'host' => 'server2',
//                    'port' => 11211,
//                    'weight' => 50,
//                ],
//            ],
//        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'namkhoasg.com@gmail.com',
                'password' => 'namkhoasg123',
                'port' => '587',
                'encryption' => 'tls',
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
        'db' => $db,
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //  'enableStrictParsing' => 'true',
            //'suffix' => '.html',

            'rules' => [
                // '/root/'.'<category>' => 'fontend/category/index',
                '/benh-xa-hoi' => 'fontend/default-benhxahoi/index',
                '/nam-khoa' => 'fontend/default-namkhoa/index',
                'rss' => 'fontend/rss/index',
                'lien-he' => 'fontend/detail/contact',
                'gioi-thieu' => 'fontend/detail/introduce',
                '/chi-phi-kham' => 'fontend/detail/policy',
                '/chinh-sach-gia' => 'fontend/detail/guide',
                '/quy-trinh-kham' => 'fontend/detail/procedure',
                '/dang-ky-kham' => '/fontend/detail/guide',
                '/site/logout'=>'/site/logout',
                '/site/404'=>'/site/error',
                'backend' => 'backend/default/index',
                '/site/login' => '/site/login',
                'search' => 'fontend/search/index',
                'author'.'/'.'<title>' => 'fontend/author/index',
                '<title>' => 'fontend/detail/index',
                '<title>'.'/'.'<category_name>' => 'fontend/list/index',
                // '/benh-hau-mon.html' => 'fontend/category1/index',
                // '/benh-xa-hoi' => 'fontend/category1/index',
                '<controller:\w+>/<title:[\d\w\-_]+>-<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ],
        ],
        //phanquyen rbac
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
           //  'class' => 'yii\rbac\PhpManager',
        ],
    ],
    //  'bootstrap' => ['debug'],
    'modules' => [
        'debug' => 'yii\debug\Module',
        'gii' => 'yii\gii\Module',
        'backend' => [
            'class' => 'app\modules\backend\Backend',
        ],
        'fontend' => [
            'layout' => 'main',
            'class' => 'app\modules\fontend\Fontend',
        ],
        'api' => [
            'class' => 'app\modules\api\Api',
        ],
    ],
    'as access' => [
        'class' => 'app\components\rbac\AccessControl',
        'allowActions' => [
            'site/*',
            //'backend/*',
            'fontend/*',
            'backend/user/backpass',
            'gii/*',
        ],
    ],
    'params' => $params,
];

//if (YII_ENV_DEV) {
//    $config['bootstrap'][] = 'debug';
//    $config['modules']['debug'] = 'yii\debug\Module';
//    $config['bootstrap'][] = 'gii';
//    $config['modules']['gii'] = 'yii\gii\Module';
//}
return $config;
