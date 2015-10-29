<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use common\models\LoginForm;
use common\models\User;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;
use yii\web\Response;
/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class ProductController extends ActiveController
{
    public $modelClass = 'api\\modules\\v1\\models\\products';
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = array('class' => HttpBasicAuth::className());
        $behaviors['bootstrap'] = array('class' => ContentNegotiator::className(), 'formats' => array('application/json' => Response::FORMAT_JSON));
        return $behaviors;
    }
    public function actions()
    {
        $actions = parent::actions();
        // disable the "delete" and "create" actions
        unset($actions['delete'], $actions['create'], $actions['get'], $actions['post']);
        // customize the data provider preparation with the "prepareDataProvider()" method
        $actions['index']['prepareDataProvider'] = array($this, 'prepareDataProvider');
        return $actions;
    }
    public function prepareDataProvider()
    {
        $response = array();
        if ($_GET['auth_key']) {
            $user = User::findOne(array('auth_key' => $_GET['auth_key']));
            if ($user) {
                $response = $user;
            } else {
                $response['Error'] = 'Authorization Key is invalid. Please create new from the end point api/web/v1/users/gettoken';
            }
        } else {
            $response['Error'] = 'Please provide a valid token';
        }
        return $response;
    }
    public function actionIndex($token)
    {
        $user = new User();
        $key = $user->generateAuthKey($email, $password);
        return $key;
    }
}