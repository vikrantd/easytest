<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_orders".
 *
 * @property integer $id
 * @property integer $marketplace_id
 * @property integer $courier_id
 * @property string $reference_code
 * @property string $order_num
 * @property string $awb_number
 * @property string $customer_name
 * @property string $landline_num
 * @property string $primary_mobile_num
 * @property string $secondary_mobile_num
 * @property string $email
 * @property string $shipping_name
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $city
 * @property string $state
 * @property string $pin_code
 * @property string $email_address
 * @property string $country
 *
 * @property EeMarketplaces $marketplace
 * @property EeSuborders[] $eeSuborders
 */
class EeOrders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marketplace_id', 'courier_id'], 'integer'],
            [['landline_num', 'primary_mobile_num', 'secondary_mobile_num'], 'required'],
            [['reference_code', 'awb_number', 'customer_name', 'email', 'shipping_name', 'address_line_1', 'address_line_2', 'city', 'state', 'pin_code'], 'string', 'max' => 100],
            [['order_num'], 'string', 'max' => 20],
            [['landline_num', 'primary_mobile_num', 'secondary_mobile_num'], 'string', 'max' => 11],
            [['email_address'], 'string', 'max' => 200],
            [['country'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marketplace_id' => 'Marketplace ID',
            'courier_id' => 'Courier ID',
            'reference_code' => 'Reference Code',
            'order_num' => 'Order Num',
            'awb_number' => 'Awb Number',
            'customer_name' => 'Customer Name',
            'landline_num' => 'Landline Num',
            'primary_mobile_num' => 'Primary Mobile Num',
            'secondary_mobile_num' => 'Secondary Mobile Num',
            'email' => 'Email',
            'shipping_name' => 'Shipping Name',
            'address_line_1' => 'Address Line 1',
            'address_line_2' => 'Address Line 2',
            'city' => 'City',
            'state' => 'State',
            'pin_code' => 'Pin Code',
            'email_address' => 'Email Address',
            'country' => 'Country',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketplace()
    {
        return $this->hasOne(EeMarketplaces::className(), ['id' => 'marketplace_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSuborders()
    {
        return $this->hasMany(EeSuborders::className(), ['order_id' => 'id']);
    }
}
