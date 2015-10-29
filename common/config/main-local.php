<?php

$params = (require __DIR__ . '/params.php');
$config = array('id' => 'basic', 'basePath' => dirname(__DIR__), 'components' => array('request' => array('cookieValidationKey' => 'x6tjpI4ZMSaasW0-pamgdcCzrMWcFpgl', 'parsers' => array('application/json' => 'yii\\web\\JsonParser')), 'cache' => array('class' => 'yii\\caching\\FileCache'), 'user' => array('identityClass' => 'app\\models\\User', 'enableAutoLogin' => false, 'enableSession' => false), 'errorHandler' => array('errorAction' => 'site/error'), 'mailer' => array('class' => 'yii\\swiftmailer\\Mailer', 'useFileTransport' => true), 'log' => array('traceLevel' => YII_DEBUG ? 3 : 0, 'targets' => array(array('class' => 'yii\\log\\FileTarget', 'levels' => array('error', 'warning')))), 'db' => array('class' => 'yii\\db\\Connection', 'dsn' => 'mysql:host=localhost;dbname=pciapi', 'username' => 'root', 'password' => '', 'charset' => 'utf8'), 'urlManager' => array('enablePrettyUrl' => true, 'enableStrictParsing' => true, 'showScriptName' => false, 'rules' => array(array('class' => 'yii\\rest\\UrlRule', 'controller' => array('book'))))), 'params' => $params);
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\\debug\\Module';
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\\gii\\Module';
}
return $config;