<?php

// ЧПУ для frontend

return [
    'class' => 'yii\web\UrlManager',
    'hostInfo' => $params['frontendHostInfo'], // чтоб мы могли в письмах понимать с какого домена
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        // меняем ссылки на более удобные
        '' => 'site/index',
        //'about' => 'site/about',
        '<_a:about|contact|signup|login>' => 'site/<_a>',

        '<_c:[\w\-]+>' => '<_c>/index',
        '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
        '<_c:[\w\-]+>/<_a:[\w-]+>' => '<_c>/<_a>',
        '<_c:[\w\-]+>/<id:\d+>/<_a:[\w-]+>' => '<_c>/<_a>',
    ],
];
