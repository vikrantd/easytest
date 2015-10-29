<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_feed_dump_attributes".
 *
 * @property integer $id
 * @property integer $feed_dump_id
 * @property string $attributes
 * @property string $value
 */
class EeFeedDumpAttributes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_feed_dump_attributes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feed_dump_id'], 'integer'],
            [['attributes'], 'string', 'max' => 50],
            [['value'], 'string', 'max' => 500]
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
            'attributes' => 'Attributes',
            'value' => 'Value',
        ];
    }
}
