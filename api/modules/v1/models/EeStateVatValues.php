<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_state_vat_values".
 *
 * @property integer $id
 * @property integer $state_id
 * @property integer $category_id
 * @property integer $min_value
 * @property integer $max_value
 * @property double $vat
 */
class EeStateVatValues extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_state_vat_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_id', 'category_id', 'min_value', 'max_value'], 'integer'],
            [['vat'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'state_id' => 'State ID',
            'category_id' => 'Category ID',
            'min_value' => 'Min Value',
            'max_value' => 'Max Value',
            'vat' => 'Vat',
        ];
    }
}
