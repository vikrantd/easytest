<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_marketplaces_product_categories".
 *
 * @property integer $id
 * @property integer $c_id
 * @property integer $marketplace_id
 * @property integer $product_id
 */
class EeMarketplacesProductCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_marketplaces_product_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'marketplace_id', 'product_id'], 'integer']
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
            'marketplace_id' => 'Marketplace ID',
            'product_id' => 'Product ID',
        ];
    }
}
