<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_shipping_charges_configuration".
 *
 * @property integer $id
 * @property integer $carriers_id
 * @property integer $m_id
 * @property double $weight_min
 * @property double $weight_max
 * @property double $intercity
 * @property double $intracity
 * @property double $national
 */
class EeShippingChargesConfiguration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_shipping_charges_configuration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['carriers_id', 'm_id', 'intercity', 'intracity', 'national'], 'required'],
            [['carriers_id', 'm_id'], 'integer'],
            [['weight_min', 'weight_max', 'intercity', 'intracity', 'national'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'carriers_id' => 'Carriers ID',
            'm_id' => 'M ID',
            'weight_min' => 'Weight Min',
            'weight_max' => 'Weight Max',
            'intercity' => 'Intercity',
            'intracity' => 'Intracity',
            'national' => 'National',
        ];
    }
}
