<?php
namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_merchant_cookie_configuration".
 *
 * @property integer $id
 * @property integer $merchant_c_id
 * @property integer $marketplace_id
 * @property string $cookie
 * @property string $seller_id
 * @property integer $cookie_type_id
 * @property string $ref_key
 * @property string $app_id
 * @property string $app_secret
 *
 * @property EeCompany $merchantC
 * @property EeMarketplaces $marketplace
 */
class EeMerchantCookieConfiguration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_merchant_cookie_configuration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_c_id', 'marketplace_id', 'cookie_type_id'], 'integer'],
            [['cookie'], 'string', 'max' => 10000],
            [['seller_id'], 'string', 'max' => 1000],
            [['ref_key'], 'string', 'max' => 50],
            [['app_id', 'app_secret'], 'string', 'max' => 70]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_c_id' => 'Merchant C ID',
            'marketplace_id' => 'Marketplace ID',
            'cookie' => 'Cookie',
            'seller_id' => 'Seller ID',
            'cookie_type_id' => 'Cookie Type ID',
            'ref_key' => 'Ref Key',
            'app_id' => 'App ID',
            'app_secret' => 'App Secret',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchantC()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'merchant_c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketplace()
    {
        return $this->hasOne(EeMarketplaces::className(), ['id' => 'marketplace_id']);
    }
}
