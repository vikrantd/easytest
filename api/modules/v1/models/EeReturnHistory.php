<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_return_history".
 *
 * @property integer $id
 * @property integer $marketplace_order_id
 * @property integer $bill_item_id
 * @property string $entry_date
 * @property string $return_date
 * @property integer $return_reason_id
 * @property string $marketplace_return_date
 * @property string $reason
 * @property string $sub_reason
 * @property string $comment
 * @property integer $return_status
 * @property integer $marketplace_transmission
 *
 * @property EeSuborders $marketplaceOrder
 * @property EeCompanyBillDetails $billItem
 * @property EeReturnStatus $returnStatus
 */
class EeReturnHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_return_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marketplace_order_id'], 'required'],
            [['marketplace_order_id', 'bill_item_id', 'return_reason_id', 'return_status', 'marketplace_transmission'], 'integer'],
            [['entry_date', 'return_date', 'marketplace_return_date'], 'safe'],
            [['reason', 'sub_reason', 'comment'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marketplace_order_id' => 'Marketplace Order ID',
            'bill_item_id' => 'Bill Item ID',
            'entry_date' => 'Entry Date',
            'return_date' => 'Return Date',
            'return_reason_id' => 'Return Reason ID',
            'marketplace_return_date' => 'Marketplace Return Date',
            'reason' => 'Reason',
            'sub_reason' => 'Sub Reason',
            'comment' => 'Comment',
            'return_status' => 'Return Status',
            'marketplace_transmission' => 'Marketplace Transmission',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketplaceOrder()
    {
        return $this->hasOne(EeSuborders::className(), ['id' => 'marketplace_order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillItem()
    {
        return $this->hasOne(EeCompanyBillDetails::className(), ['id' => 'bill_item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReturnStatus()
    {
        return $this->hasOne(EeReturnStatus::className(), ['id' => 'return_status']);
    }
}
