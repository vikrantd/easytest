<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_inventory_status".
 *
 * @property integer $id
 * @property string $status
 *
 * @property EeCompanyBillDetails[] $eeCompanyBillDetails
 */
class EeInventoryStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_inventory_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyBillDetails()
    {
        return $this->hasMany(EeCompanyBillDetails::className(), ['inventory_status_id' => 'id']);
    }
}
