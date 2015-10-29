<?php
namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_carrier_credentials".
 *
 * @property integer $id
 * @property integer $carrier_id
 * @property integer $merchant_c_id
 * @property string $key
 * @property string $url
 * @property string $username
 * @property string $password
 * @property integer $active
 *
 * @property EeCarriers $carrier
 * @property EeCompany $merchantC
 */
class EeCarrierCredentials extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_carrier_credentials';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['carrier_id', 'merchant_c_id', 'key', 'url', 'active'], 'required'],
            [['carrier_id', 'merchant_c_id', 'active'], 'integer'],
            [['key'], 'string', 'max' => 200],
            [['url'], 'string', 'max' => 500],
            [['username', 'password'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'carrier_id' => 'Carrier ID',
            'merchant_c_id' => 'Merchant C ID',
            'key' => 'Key',
            'url' => 'Url',
            'username' => 'Username',
            'password' => 'Password',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarrier()
    {
        return $this->hasOne(EeCarriers::className(), ['id' => 'carrier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchantC()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'merchant_c_id']);
    }
}
