<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_payment_adjustments".
 *
 * @property integer $id
 * @property double $amount
 * @property integer $payment_id
 * @property string $adjustment_date
 * @property string $reference_num
 * @property string $adjustment_reason
 * @property string $adjustment_description
 */
class EePaymentAdjustments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_payment_adjustments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount'], 'number'],
            [['payment_id', 'adjustment_date', 'adjustment_reason', 'adjustment_description'], 'required'],
            [['payment_id'], 'integer'],
            [['adjustment_date'], 'safe'],
            [['reference_num', 'adjustment_reason', 'adjustment_description'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'payment_id' => 'Payment ID',
            'adjustment_date' => 'Adjustment Date',
            'reference_num' => 'Reference Num',
            'adjustment_reason' => 'Adjustment Reason',
            'adjustment_description' => 'Adjustment Description',
        ];
    }
}
