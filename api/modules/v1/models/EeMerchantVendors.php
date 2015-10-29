<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_merchant_vendors".
 *
 * @property integer $id
 * @property integer $merchant_c_id
 * @property integer $vendor_c_id
 * @property integer $priority
 */
class EeMerchantVendors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_merchant_vendors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_c_id', 'vendor_c_id', 'priority'], 'required'],
            [['merchant_c_id', 'vendor_c_id', 'priority'], 'integer']
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
            'vendor_c_id' => 'Vendor C ID',
            'priority' => 'Priority',
        ];
    }
}
