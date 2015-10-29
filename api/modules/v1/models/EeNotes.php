<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_notes".
 *
 * @property integer $id
 * @property string $notes
 * @property string $date_time
 */
class EeNotes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_notes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_time'], 'safe'],
            [['notes'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'notes' => 'Notes',
            'date_time' => 'Date Time',
        ];
    }
}
