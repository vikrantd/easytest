<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_merchanttype".
 *
 * @property integer $type_id
 * @property string $type
 */
class EeMerchanttype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_merchanttype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id'], 'integer'],
            [['type'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'type' => 'Type',
        ];
    }
}
