<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_dates".
 *
 * @property integer $id
 * @property string $start_date
 * @property string $end_date
 * @property integer $marketplace_id
 *
 * @property EeMarketplaces $marketplace
 */
class EeDates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_dates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'marketplace_id'], 'integer'],
            [['start_date', 'end_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'marketplace_id' => 'Marketplace ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketplace()
    {
        return $this->hasOne(EeMarketplaces::className(), ['id' => 'marketplace_id']);
    }
}
