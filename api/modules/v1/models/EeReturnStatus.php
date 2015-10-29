<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_return_status".
 *
 * @property integer $id
 * @property string $Status
 *
 * @property EeReturnHistory[] $eeReturnHistories
 */
class EeReturnStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_return_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Status'], 'required'],
            [['id'], 'integer'],
            [['Status'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeReturnHistories()
    {
        return $this->hasMany(EeReturnHistory::className(), ['return_status' => 'id']);
    }
}
