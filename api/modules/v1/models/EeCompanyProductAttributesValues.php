<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company_product_attributes_values".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $attribute_id
 * @property string $value
 * @property string $entry_date
 *
 * @property EeProducts $product
 * @property EeMasterProductCategoryAttributes $attribute
 */
class EeCompanyProductAttributesValues extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_product_attributes_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'attribute_id'], 'integer'],
            [['entry_date'], 'safe'],
            [['value'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'attribute_id' => 'Attribute ID',
            'value' => 'Value',
            'entry_date' => 'Entry Date',
        ];
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
    public function getAttribute()
    {
        return $this->hasOne(EeMasterProductCategoryAttributes::className(), ['id' => 'attribute_id']);
    }
}
