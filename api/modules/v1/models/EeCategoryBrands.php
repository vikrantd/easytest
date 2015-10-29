<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_category_brands".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property integer $brand_id
 *
 * @property EeMasterProductCategories $cat
 * @property EeBrands $brand
 */
class EeCategoryBrands extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_category_brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'brand_id'], 'integer']
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
        ];
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
