<?php

$mongodb = require __DIR__ . '/mongodb.php';

return [
    'id' => 'test',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'hipstercreative\user\Bootstrap'
    ],
    'extensions' => require(VENDOR_DIR . '/yiisoft/extensions.php'),
    'aliases' => [
        '@hipstercreative/user' => realpath(__DIR__. '/../../../'),
        '@vendor' => VENDOR_DIR
    ],
    'modules' => [
        'user' => [
            'class' => 'hipstercreative\user\Module',
            'admins' => ['user']
        ]
    ],
    'components' => [
        'assetManager' => [
            'basePath' => '@tests/_app/assets'
        ],
        'log'   => null,
        'cache' => null,
        'request' => [
            'enableCsrfValidation' => false
        ],
        'db' => $mongodb,
        'mail' => [
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => '127.0.0.1',
                'port' => '1025',
            ]
        ],
    ],
];
