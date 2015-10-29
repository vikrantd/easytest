<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_dispute_notes".
 *
 * @property integer $id
 * @property integer $ticket_id
 * @property integer $notes_id
 * @property integer $user_id
 */
class EeDisputeNotes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_dispute_notes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_id', 'notes_id', 'user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticket_id' => 'Ticket ID',
            'notes_id' => 'Notes ID',
            'user_id' => 'User ID',
        ];
    }
}
