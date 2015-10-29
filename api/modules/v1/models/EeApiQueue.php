<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_api_queue".
 *
 * @property integer $id
 * @property integer $listing_id
 * @property integer $suborder_id
 * @property integer $api_action_id
 * @property integer $status_id
 * @property string $message
 * @property string $data
 * @property integer $upload_id
 * @property string $submit_id
 * @property integer $counter
 * @property string $queue_date
 * @property string $process_date
 *
 * @property EeCompanyProductListings $listing
 * @property EeApiQueueStatus $status
 * @property EeSuborders $suborder
 */
class EeApiQueue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_api_queue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['listing_id', 'suborder_id', 'api_action_id', 'status_id', 'upload_id', 'submit_id', 'counter'], 'integer'],
            [['api_action_id', 'status_id', 'counter'], 'required'],
            [['message'], 'string'],
            [['queue_date', 'process_date'], 'safe'],
            [['data'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'listing_id' => 'Listing ID',
            'suborder_id' => 'Suborder ID',
            'api_action_id' => 'Api Action ID',
            'status_id' => 'Status ID',
            'message' => 'Message',
            'data' => 'Data',
            'upload_id' => 'Upload ID',
            'submit_id' => 'Submit ID',
            'counter' => 'Counter',
            'queue_date' => 'Queue Date',
            'process_date' => 'Process Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListing()
    {
        return $this->hasOne(EeCompanyProductListings::className(), ['id' => 'listing_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(EeApiQueueStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuborder()
    {
        return $this->hasOne(EeSuborders::className(), ['id' => 'suborder_id']);
    }
}
