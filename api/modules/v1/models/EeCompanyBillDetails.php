<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company_bill_details".
 *
 * @property integer $id
 * @property integer $company_bill_id
 * @property integer $marketplaces_order_id
 * @property integer $brand_id
 * @property integer $product_id
 * @property double $mrp
 * @property double $cost
 * @property integer $inventory_status_id
 * @property string $entry_date
 *
 * @property EeCompanyBills $companyBill
 * @property EeSuborders $marketplacesOrder
 * @property EeBrands $brand
 * @property EeProducts $product
 * @property EeInventoryStatus $inventoryStatus
 * @property EeReturnHistory[] $eeReturnHistories
 */
class EeCompanyBillDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_bill_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_bill_id', 'marketplaces_order_id', 'brand_id', 'product_id', 'inventory_status_id'], 'integer'],
            [['mrp', 'cost'], 'number'],
            [['entry_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_bill_id' => 'Company Bill ID',
            'marketplaces_order_id' => 'Marketplaces Order ID',
            'brand_id' => 'Brand ID',
            'product_id' => 'Product ID',
            'mrp' => 'Mrp',
            'cost' => 'Cost',
            'inventory_status_id' => 'Inventory Status ID',
            'entry_date' => 'Entry Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyBill()
    {
        return $this->hasOne(EeCompanyBills::className(), ['id' => 'company_bill_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketplacesOrder()
    {
        return $this->hasOne(EeSuborders::className(), ['id' => 'marketplaces_order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(EeBrands::className(), ['brand_id' => 'brand_id']);
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
    public function getInventoryStatus()
    {
        return $this->hasOne(EeInventoryStatus::className(), ['id' => 'inventory_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeReturnHistories()
    {
        return $this->hasMany(EeReturnHistory::className(), ['bill_item_id' => 'id']);
    }
}
