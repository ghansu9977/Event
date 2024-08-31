<?php
use GuzzleHttp\Psr7\Response;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7IpSufQqyEOsKD4l_L0gjvJpaP7sgM-j',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\event',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'react/<path:.*>' => 'site/react',
                'GET api/properties' => 'property/get-all-properties',
                'POST api/properties' => 'property/create-property',
                'GET api/properties/<id:\d+>' => 'property/view-property',
                'PUT api/properties/<id:\d+>' => 'property/update-property',
                'DELETE api/properties/<id:\d+>' => 'property/delete-property',
                'GET api/properties/search' => 'property/search-properties',
                'POST api/properties/mark-favorite' => 'property/mark-as-favorite',
                'POST api/properties/unmark-favorite' => 'property/unmark-as-favorite',
                'GET api/properties/favorites' => 'property/get-favorites',
                'GET api/users/<userId:\d+>/properties' => 'property/view-property-of-particular-user'
            ],
        ],
        'corsFilter' => [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                'Origin' => ['http://localhost:5173'], // Allows requests from any origin
                'Access-Control-Request-Method' => ['*'], // Allows all methods
                'Access-Control-Request-Headers' => ['*'], // Allows all headers
                'Access-Control-Allow-Credentials' => true,
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
