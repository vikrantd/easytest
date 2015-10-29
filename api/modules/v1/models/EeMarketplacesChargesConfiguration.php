<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_marketplaces_charges_configuration".
 *
 * @property integer $id
 * @property integer $c_id
 * @property integer $m_id
 * @property integer $cat_id
 * @property double $min
 * @property double $max
 * @property integer $charge_type_id
 * @property double $value
 * @property integer $charge_type_mode_id
 */
class EeMarketplacesChargesConfiguration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_marketplaces_charges_configuration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'value'], 'required'],
            [['c_id', 'm_id', 'cat_id', 'charge_type_id', 'charge_type_mode_id'], 'integer'],
            [['min', 'max', 'value'], 'number']
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
            'm_id' => 'M ID',
            'cat_id' => 'Cat ID',
            'min' => 'Min',
            'max' => 'Max',
            'charge_type_id' => 'Charge Type ID',
            'value' => 'Value',
            'charge_type_mode_id' => 'Charge Type Mode ID',
        ];
    }
}
