<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'], // чтоб логи запускались при старте приложения
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => $params['cookieValidationKey'],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            //'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'identityCookie' => [
                'name' => '_identity',
                'httpOnly' => true,
                'domain' => $params['domain'],
            ],
        ],
        'session' => [
            // 'class' => 'yii\web\Session', - класс указывать не обязательно, он подставляется автоматически
            // this is the name of the session cookie used for login on the backend
            //'name' => 'advanced-backend',
            'name' => 'advanced-shop',
            'cookieParams' => [
                'httpOnly' => true,
                'domain' => $params['domain'],
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        // включаем ЧПУ
        'backendUrlManager' => require __DIR__ . '/urlManager.php',
        'frontendUrlManager' => require __DIR__ . '/../../frontend/config/urlManager.php',
        'urlManager' => function () {
            return Yii::$app->get('backendUrlManager');
        },
    ],
    // добавляем глобавльное правило из backend/controllers/SiteController.php
    // (lesson 1 2:53)
    'as access' => [
        'class' => 'yii\filters\AccessControl',
        //'only'=> [], // к каким контролеррами применять правило
        'except'=> ['site/login', 'site/error'], // контроллеры исключения
        'rules' => [
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ],
    ],
    'params' => $params,
];
