<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_mp_cat_attributes".
 *
 * @property integer $id
 * @property integer $marketplace_id
 * @property integer $mpc_attribute_id
 * @property string $field
 * @property string $trim_value
 * @property string $att_add_date
 *
 * @property EeMarketplaces $marketplace
 * @property EeMasterProductCategoryAttributes $mpcAttribute
 */
class EeMpCatAttributes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_mp_cat_attributes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marketplace_id', 'mpc_attribute_id', 'field'], 'required'],
            [['marketplace_id', 'mpc_attribute_id'], 'integer'],
            [['att_add_date'], 'safe'],
            [['field'], 'string', 'max' => 300],
            [['trim_value'], 'string', 'max' => 2000]
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
            'mpc_attribute_id' => 'Mpc Attribute ID',
            'field' => 'Field',
            'trim_value' => 'Trim Value',
            'att_add_date' => 'Att Add Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketplace()
    {
        return $this->hasOne(EeMarketplaces::className(), ['id' => 'marketplace_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMpcAttribute()
    {
        return $this->hasOne(EeMasterProductCategoryAttributes::className(), ['id' => 'mpc_attribute_id']);
    }
}
