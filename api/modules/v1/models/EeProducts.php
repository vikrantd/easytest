<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_products".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property integer $brand_id
 * @property string $model_no
 * @property string $variant
 * @property double $mrp
 * @property string $product_unique_code
 * @property string $description
 * @property string $name
 * @property integer $weight
 * @property integer $length
 * @property integer $height
 * @property integer $width
 * @property integer $ready_to_upload
 *
 * @property EeClusteringMultipleProducts[] $eeClusteringMultipleProducts
 * @property EeCompanyBillDetails[] $eeCompanyBillDetails
 * @property EeCompanyFeed[] $eeCompanyFeeds
 * @property EeCompanyInvoiceDetails[] $eeCompanyInvoiceDetails
 * @property EeCompanyProduct[] $eeCompanyProducts
 * @property EeCompanyProductAttributesValues[] $eeCompanyProductAttributesValues
 * @property EeCompanyProductCategories[] $eeCompanyProductCategories
 * @property EeProductMapping[] $eeProductMappings
 * @property EeProductMapping[] $eeProductMappings0
 * @property EeBrands $brand
 * @property EeMasterProductCategories $cat
 * @property FeedDump[] $feedDumps
 */
class EeProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'brand_id', 'model_no', 'variant'], 'required'],
            [['cat_id', 'brand_id', 'weight', 'length', 'height', 'width', 'ready_to_upload'], 'integer'],
            [['mrp'], 'number'],
            [['model_no', 'name'], 'string', 'max' => 100],
            [['variant'], 'string', 'max' => 50],
            [['product_unique_code'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 10000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Cat ID',
            'brand_id' => 'Brand ID',
            'model_no' => 'Model No',
            'variant' => 'Variant',
            'mrp' => 'Mrp',
            'product_unique_code' => 'Product Unique Code',
            'description' => 'Description',
            'name' => 'Name',
            'weight' => 'Weight',
            'length' => 'Length',
            'height' => 'Height',
            'width' => 'Width',
            'ready_to_upload' => 'Ready To Upload',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeClusteringMultipleProducts()
    {
        return $this->hasMany(EeClusteringMultipleProducts::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyBillDetails()
    {
        return $this->hasMany(EeCompanyBillDetails::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyFeeds()
    {
        return $this->hasMany(EeCompanyFeed::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyInvoiceDetails()
    {
        return $this->hasMany(EeCompanyInvoiceDetails::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyProducts()
    {
        return $this->hasMany(EeCompanyProduct::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyProductAttributesValues()
    {
        return $this->hasMany(EeCompanyProductAttributesValues::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyProductCategories()
    {
        return $this->hasMany(EeCompanyProductCategories::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeProductMappings()
    {
        return $this->hasMany(EeProductMapping::className(), ['prev_product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeProductMappings0()
    {
        return $this->hasMany(EeProductMapping::className(), ['updated_product_id' => 'id']);
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
    public function getCat()
    {
        return $this->hasOne(EeMasterProductCategories::className(), ['id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedDumps()
    {
        return $this->hasMany(FeedDump::className(), ['product_id' => 'id']);
    }
}
