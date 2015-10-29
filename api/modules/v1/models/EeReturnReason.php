<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_return_reason".
 *
 * @property integer $id
 * @property string $description
 * @property integer $dispute_needed
 */
class EeReturnReason extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_return_reason';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dispute_needed'], 'required'],
            [['dispute_needed'], 'integer'],
            [['description'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'dispute_needed' => 'Dispute Needed',
        ];
    }
}
