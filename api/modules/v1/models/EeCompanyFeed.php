<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company_feed".
 *
 * @property integer $id
 * @property string $model
 * @property string $item_code
 * @property string $product_unique_code
 * @property integer $inventory
 * @property double $mrp
 * @property double $cost
 * @property integer $c_id
 * @property integer $brand_id
 * @property string $cat_id
 * @property integer $product_id
 * @property integer $reserved_inventory
 * @property integer $sla
 *
 * @property EeCompany $c
 * @property EeProducts $product
 * @property EeCompanySalesFeed[] $eeCompanySalesFeeds
 */
class EeCompanyFeed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_feed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inventory', 'c_id', 'reserved_inventory'], 'required'],
            [['inventory', 'c_id', 'brand_id', 'product_id', 'reserved_inventory', 'sla'], 'integer'],
            [['mrp', 'cost'], 'number'],
            [['model'], 'string', 'max' => 200],
            [['item_code'], 'string', 'max' => 10],
            [['product_unique_code', 'cat_id'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'item_code' => 'Item Code',
            'product_unique_code' => 'Product Unique Code',
            'inventory' => 'Inventory',
            'mrp' => 'Mrp',
            'cost' => 'Cost',
            'c_id' => 'C ID',
            'brand_id' => 'Brand ID',
            'cat_id' => 'Cat ID',
            'product_id' => 'Product ID',
            'reserved_inventory' => 'Reserved Inventory',
            'sla' => 'Sla',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(EeProducts::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanySalesFeeds()
    {
        return $this->hasMany(EeCompanySalesFeed::className(), ['company_feed_id' => 'id']);
    }
}
