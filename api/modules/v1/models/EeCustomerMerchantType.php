<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_customer_merchant_type".
 *
 * @property integer $id
 * @property integer $c_id
 * @property integer $type_id
 */
class EeCustomerMerchantType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_customer_merchant_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'type_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c_id' => 'C ID',
            'type_id' => 'Type ID',
        ];
    }
}
