<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    //require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php')
    //require(__DIR__ . '/params-local.php')

);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),    
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],
    'components' => [        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
        ],
		'db' => [
			
			'class' => 'yii\\db\\Connection', 
			'dsn' => 'mysql:host=localhost;dbname=pciapi', 
			'username' => 'root', 
			'password' => '', 
			'charset' => 'utf8'
		
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/bill',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ],
                    'extraPatterns' => [
                        'POST updateinventory' => 'updateinventory']
                    
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/product',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                    
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/user',
                    'tokens' => [
                    ],
                    'extraPatterns' => [
                        'POST gettoken' => 'gettoken']
                    
                ]
            ],        
        ]
    ],
    'params' => $params,
];



