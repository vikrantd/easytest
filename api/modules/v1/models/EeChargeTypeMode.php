<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_charge_type_mode".
 *
 * @property integer $id
 * @property string $mode
 */
class EeChargeTypeMode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_charge_type_mode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mode'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mode' => 'Mode',
        ];
    }
}
