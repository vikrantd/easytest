<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_feed_dump_images".
 *
 * @property integer $id
 * @property integer $feed_dump_id
 * @property string $image_url
 * @property string $image_url_zoom
 */
class EeFeedDumpImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_feed_dump_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feed_dump_id'], 'integer'],
            [['image_url', 'image_url_zoom'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feed_dump_id' => 'Feed Dump ID',
            'image_url' => 'Image Url',
            'image_url_zoom' => 'Image Url Zoom',
        ];
    }
}
