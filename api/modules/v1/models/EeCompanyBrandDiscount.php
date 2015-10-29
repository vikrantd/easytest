<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company_brand_discount".
 *
 * @property integer $id
 * @property integer $c_id
 * @property integer $cat_id
 * @property integer $brand_id
 * @property integer $discount
 *
 * @property EeCompany $c
 * @property EeMasterProductCategories $cat
 * @property EeBrands $brand
 */
class EeCompanyBrandDiscount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_brand_discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'cat_id', 'brand_id', 'discount'], 'integer']
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
            'cat_id' => 'Cat ID',
            'brand_id' => 'Brand ID',
            'discount' => 'Discount',
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
    public function getCat()
    {
        return $this->hasOne(EeMasterProductCategories::className(), ['id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(EeBrands::className(), ['brand_id' => 'brand_id']);
    }
}
