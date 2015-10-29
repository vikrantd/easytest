<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_api_queue_status".
 *
 * @property integer $id
 * @property string $name
 *
 * @property EeApiQueue[] $eeApiQueues
 */
class EeApiQueueStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_api_queue_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeApiQueues()
    {
        return $this->hasMany(EeApiQueue::className(), ['status_id' => 'id']);
    }
}
