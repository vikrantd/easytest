<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_brands".
 *
 * @property integer $brand_id
 * @property string $brands
 * @property string $model_prefix_list
 * @property string $model_suffix_list
 *
 * @property EeCategoryBrands[] $eeCategoryBrands
 * @property EeCompanyBillDetails[] $eeCompanyBillDetails
 * @property EeCompanyBrandDiscount[] $eeCompanyBrandDiscounts
 * @property EeCompanyInvoiceDetails[] $eeCompanyInvoiceDetails
 * @property EeProducts[] $eeProducts
 */
class EeBrands extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brands'], 'string', 'max' => 40],
            [['model_prefix_list'], 'string', 'max' => 200],
            [['model_suffix_list'], 'string', 'max' => 100],
            [['brands'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'brand_id' => 'Brand ID',
            'brands' => 'Brands',
            'model_prefix_list' => 'Model Prefix List',
            'model_suffix_list' => 'Model Suffix List',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCategoryBrands()
    {
        return $this->hasMany(EeCategoryBrands::className(), ['brand_id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyBillDetails()
    {
        return $this->hasMany(EeCompanyBillDetails::className(), ['brand_id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyBrandDiscounts()
    {
        return $this->hasMany(EeCompanyBrandDiscount::className(), ['brand_id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyInvoiceDetails()
    {
        return $this->hasMany(EeCompanyInvoiceDetails::className(), ['brand_id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeProducts()
    {
        return $this->hasMany(EeProducts::className(), ['brand_id' => 'brand_id']);
    }
}
