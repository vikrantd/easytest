<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use common\models\LoginForm;
use common\models\User;
use api\modules\v1\models\EeCompanyBillDetails;
use api\modules\v1\models\EeCompanyProduct;
use api\modules\v1\models\EeCompanyBills;
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
class BillController extends ActiveController
{
    public $modelClass = 'api\\modules\\v1\\models\\eecompanybills';
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['bootstrap'] = array('class' => ContentNegotiator::className(), 'formats' => array('application/json' => Response::FORMAT_JSON));
        return $behaviors;
    }
    public function actions()
    {
        $actions = parent::actions();
        // disable the "delete" and "create" actions
        unset($actions['delete'], $actions['create'], $actions['get']);
        // customize the data provider preparation with the "prepareDataProvider()" method
        $actions['index']['prepareDataProvider'] = array($this, 'prepareDataProvider');
        return $actions;
    }
    public function actionGet()
    {
        return 23;
    }
    public function prepareDataProvider()
    {
        $response = array();
        if ($_GET['auth_key']) {
            $user = User::findOne(array('auth_key' => $_GET['auth_key']));
            if ($user) {
                if ($_GET['sku']) {
                    $response = $this->getdata($_GET['sku'], $user->c_id);
                } else {
                    $response['Error'] = 'Please pass the sku. Refer the documentation';
                }
            } else {
                $response['Error'] = 'Authorization Key is invalid. Please create new from the end point api/web/v1/users/gettoken';
            }
        } else {
            $response['Error'] = 'Please provide a valid token';
        }
        return $response;
    }
    public function getdata($sku, $c_id)
    {
        $response = array();
        $companyproducts = EeCompanyProduct::find()->joinWith(array('c' => function ($q) {
            $q->from('ee_company ec');
        }))->joinWith(array('product'))->where('sku = :abc AND ec.c_id = :cid', array(':abc' => $sku, ':cid' => $c_id))->limit(10)->all();
        if ($companyproducts) {
            $bills = EeCompanyBillDetails::find()->joinWith(array('companyBill' => function ($q) {
                $q->from('ee_company_bills');
            }))->joinWith('eeReturnHistories')->where('merchant_c_id = :cid AND product_id = :pi AND inventory_status_id IN (1,6)', array(':cid' => $companyproducts[0]->c_id, ':pi' => $companyproducts[0]['product_id']))->all();
            if ($bills) {
                $response['Available_Inventory'] = count($bills);
                $response['Company'] = $companyproducts[0]->c['companyname'];
                $response['Product Model'] = $companyproducts[0]->product['model_no'];
                $response['Product Description'] = $companyproducts[0]->product['description'];
                $response['Product MRP'] = $companyproducts[0]->product['mrp'];
                $response['Bill Id'] = $bills;
                $response['CP'] = $companyproducts[0];
                $response['Product'] = $companyproducts[0]->product;
            } else {
                $response['Available_Inventory'] = 0;
                $response['Company'] = $companyproducts[0]->c['companyname'];
                $response['Product Model'] = $companyproducts[0]->product['model_no'];
                $response['Product Description'] = $companyproducts[0]->product['description'];
                $response['Product MRP'] = $companyproducts[0]->product['mrp'];
                $response['CP'] = $companyproducts[0];
                $response['Product'] = $companyproducts[0]->product;
            }
        } else {
            $response['Error'] = 'No product found';
        }
        return $response;
    }
    public function actionUpdateinventory()
    {
        $response = array();
        if ($_GET['auth_key']) {
            $user = User::findOne(array('auth_key' => $_GET['auth_key']));
            if ($user) {
                if ($_POST['sku'] && $_POST['inventory']) {
                    $index = 0;
                    foreach ($_POST['sku'] as $key => $sku) {
                        $data = $this->getdata($sku, $user->c_id);
                        if (isset($data['Available_Inventory'])) {
                            //$response[$key] = $data;
                            $response[$key]['SKU'] = $sku;
                            //echo $data['Available_Inventory'];
                            if ($data['Available_Inventory'] > $_POST['inventory'][$key]) {
                                $change = $data['Available_Inventory'] - $_POST['inventory'][$key];
                                //echo "<pre>";
                                //print_r($data['Bill Id'][0]);
                                //$history = $data['Bill Id'][0]->joinWith('eeReturnHistories');
                                //$response['return'] = $history->eeReturnHistories;
                                $reserved = array();
                                $unreserved = array();
                                $returnhistoryarray = array();
                                $noreturnhistoryarray = array();
                                foreach ($data['Bill Id'] as $key => $bill) {
                                    if ($bill->inventory_status_id == 6) {
                                        array_push($reserved, $bill);
                                    } else {
                                        if (!$bill->eeReturnHistories) {
                                            array_push($noreturnhistoryarray, $bill);
                                        } else {
                                            array_push($returnhistoryarray, $bill);
                                        }
                                    }
                                }
                                $remaining = 0;
                                if ($change >= count($noreturnhistoryarray)) {
                                    $remaining = $change - count($noreturnhistoryarray);
                                    foreach ($noreturnhistoryarray as $nrh) {
                                        $nrh->delete();
                                    }
                                } else {
                                    for ($i = 0; $i < $change; $i++) {
                                        $noreturnhistoryarray[$i]->delete();
                                    }
                                }
                                if ($remaining >= count($returnhistoryarray)) {
                                    $remaining = $remaining - count($returnhistoryarray);
                                    foreach ($returnhistoryarray as $key => $rha) {
                                        $rha->inventory_status_id = 11;
                                        $rha->update();
                                    }
                                } else {
                                    $remaining = 0;
                                    for ($i = 0; $i < $remaining; $i++) {
                                        $returnhistoryarray[$i]->inventory_status_id = 11;
                                        $returnhistoryarray[$i]->update();
                                    }
                                }
                                if ($remaining) {
                                    $response[$key]['Info'] = $change - $remaining . ' has been subtracted from the inventory. Failed to subtract ' . $remaining . ', as these are reserved.';
                                } else {
                                    $response[$key]['Info'] = $change . ' inventory has been subtracted successfully';
                                }
                            } else {
                                if ($data['Available_Inventory'] == $_POST['inventory'][$key]) {
                                    $response[$key]['Info'] = 'Available Inventory is same as the input inventory';
                                } else {
                                    $increase = $_POST['inventory'][$key] - $data['Available_Inventory'];
                                    //$response[$key]['Info'] = $data['Available_Inventory'] - $_POST['inventory'][$key];
                                    for ($i = 0; $i < $increase; $i++) {
                                        $bill = new eeCompanyBillDetails();
                                        $bill->product_id = $data['Product']->id;
                                        //$bill->c_id = $data['CP']->c_id;
                                        $bill->brand_id = $data['Product']->brand_id;
                                        $bill->inventory_status_id = 1;
                                        $bill->company_bill_id = 454;
                                        $bill->save();
                                    }
                                    $response[$key]['Info'] = 'Successfull added ' . $increase . ' inventory.';
                                }
                            }
                        } else {
                            // echo "string";
                            $response[$key] = $data;
                            //$response[$key]["Error"] = "Could not be updated as there is no inventory";
                            $response[$key]['SKU'] = $sku;
                        }
                        $index++;
                    }
                } else {
                    $response['Error'] = 'Missing Parameters sku or inventory';
                }
            }
        }
        return $response;
    }
}