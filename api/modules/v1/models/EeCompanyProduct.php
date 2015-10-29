<?php
namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_company_product".
 *
 * @property integer $id
 * @property integer $c_id
 * @property integer $product_id
 * @property string $sku
 * @property integer $feed_dump_id
 * @property integer $catalog_id
 * @property double $mrp
 * @property integer $ready_to_upload
 * @property string $add_date
 * @property string $update_date
 * @property double $cost
 *
 * @property EeCompany $c
 * @property EeProducts $product
 * @property EeCompanyProductListings[] $eeCompanyProductListings
 * @property EeSuborders[] $eeSuborders
 */
class EeCompanyProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'product_id', 'feed_dump_id', 'catalog_id', 'ready_to_upload'], 'integer'],
            [['mrp', 'cost'], 'number'],
            [['add_date', 'update_date'], 'safe'],
            [['sku'], 'string', 'max' => 500]
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
            'product_id' => 'Product ID',
            'sku' => 'Sku',
            'feed_dump_id' => 'Feed Dump ID',
            'catalog_id' => 'Catalog ID',
            'mrp' => 'Mrp',
            'ready_to_upload' => 'Ready To Upload',
            'add_date' => 'Add Date',
            'update_date' => 'Update Date',
            'cost' => 'Cost',
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
    public function getEeCompanyProductListings()
    {
        return $this->hasMany(EeCompanyProductListings::className(), ['company_product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSuborders()
    {
        return $this->hasMany(EeSuborders::className(), ['company_product_id' => 'id']);
    }
}
