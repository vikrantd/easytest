<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use common\models\LoginForm;
use common\models\User;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\IdentityInterface;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class UserController extends ActiveController
{
    public $modelClass = 'common\\models\\User';
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        //$behaviors['authenticator'] = array('class' => HttpBasicAuth::className());
        return $behaviors;
    }


    public function actionGettoken($email, $password)
    {
        $user = new User();
        $key = $user->generateAuthKey($email, $password);
        return $key;
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

    }
}