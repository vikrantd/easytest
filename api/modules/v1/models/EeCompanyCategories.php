<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company_categories".
 *
 * @property integer $id
 * @property integer $c_id
 * @property integer $partner_id
 * @property integer $cat_id
 * @property string $unit
 *
 * @property EeCompany $c
 * @property EeMarketplaces $partner
 * @property EeMasterProductCategories $cat
 */
class EeCompanyCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'partner_id', 'cat_id'], 'integer'],
            [['unit'], 'string', 'max' => 100]
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
            'partner_id' => 'Partner ID',
            'cat_id' => 'Cat ID',
            'unit' => 'Unit',
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
    public function getPartner()
    {
        return $this->hasOne(EeMarketplaces::className(), ['id' => 'partner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(EeMasterProductCategories::className(), ['id' => 'cat_id']);
    }
}
