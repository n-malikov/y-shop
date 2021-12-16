<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset', // урок 1 -> 1:29 меняем алиасы
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
