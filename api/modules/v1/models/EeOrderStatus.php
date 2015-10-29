<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_order_status".
 *
 * @property integer $id
 * @property string $description
 *
 * @property EeSuborders[] $eeSuborders
 * @property EeVendorOrderIntraction[] $eeVendorOrderIntractions
 */
class EeOrderStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_order_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'description'], 'required'],
            [['id'], 'integer'],
            [['description'], 'string', 'max' => 50]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSuborders()
    {
        return $this->hasMany(EeSuborders::className(), ['status_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeVendorOrderIntractions()
    {
        return $this->hasMany(EeVendorOrderIntraction::className(), ['status_id' => 'id']);
    }
}
