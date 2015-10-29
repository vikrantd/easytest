<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_payments_not_imported".
 *
 * @property integer $id
 * @property integer $c_id
 * @property integer $marketplace_id
 * @property string $settlement_ref_no
 * @property string $settlement_date
 * @property string $reason
 * @property string $add_time
 *
 * @property EeCompany $c
 * @property EeMarketplaces $marketplace
 */
class EePaymentsNotImported extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_payments_not_imported';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'marketplace_id'], 'integer'],
            [['settlement_date', 'add_time'], 'safe'],
            [['settlement_ref_no'], 'string', 'max' => 100],
            [['reason'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c_id' => 'C ID',
            'marketplace_id' => 'Marketplace ID',
            'settlement_ref_no' => 'Settlement Ref No',
            'settlement_date' => 'Settlement Date',
            'reason' => 'Reason',
            'add_time' => 'Add Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketplace()
    {
        return $this->hasOne(EeMarketplaces::className(), ['id' => 'marketplace_id']);
    }
}
