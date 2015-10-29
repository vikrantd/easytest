<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_mp_categories".
 *
 * @property integer $id
 * @property integer $marketplace_id
 * @property integer $cat_id
 * @property string $mp_category_value
 * @property string $mp_category_name
 *
 * @property EeMerchantProductListings[] $eeMerchantProductListings
 * @property EeMasterProductCategories $cat
 * @property EeMarketplaces $marketplace
 */
class EeMpCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_mp_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marketplace_id', 'cat_id'], 'integer'],
            [['mp_category_value', 'mp_category_name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marketplace_id' => 'Marketplace ID',
            'cat_id' => 'Cat ID',
            'mp_category_value' => 'Mp Category Value',
            'mp_category_name' => 'Mp Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeMerchantProductListings()
    {
        return $this->hasMany(EeMerchantProductListings::className(), ['marketplace_cat_id' => 'id']);
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
    public function getMarketplace()
    {
        return $this->hasOne(EeMarketplaces::className(), ['id' => 'marketplace_id']);
    }
}
