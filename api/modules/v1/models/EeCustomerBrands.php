<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_customer_brands".
 *
 * @property integer $id
 * @property integer $c_id
 * @property integer $brand_id
 */
class EeCustomerBrands extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_customer_brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'brand_id'], 'integer']
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
            'brand_id' => 'Brand ID',
        ];
    }
}
