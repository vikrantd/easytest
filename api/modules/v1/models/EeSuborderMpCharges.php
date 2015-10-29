<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_suborder_mp_charges".
 *
 * @property integer $id
 * @property integer $payment_details_id
 * @property integer $suborder_id
 * @property integer $charge_type_id
 * @property double $charge
 *
 * @property EeSuborders $suborder
 * @property EeChargeType $chargeType
 * @property EeChargeType $chargeType0
 * @property EePaymentDetails $paymentDetails
 */
class EeSuborderMpCharges extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_suborder_mp_charges';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_details_id', 'suborder_id', 'charge_type_id'], 'integer'],
            [['charge'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_details_id' => 'Payment Details ID',
            'suborder_id' => 'Suborder ID',
            'charge_type_id' => 'Charge Type ID',
            'charge' => 'Charge',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuborder()
    {
        return $this->hasOne(EeSuborders::className(), ['id' => 'suborder_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChargeType()
    {
        return $this->hasOne(EeChargeType::className(), ['id' => 'charge_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChargeType0()
    {
        return $this->hasOne(EeChargeType::className(), ['id' => 'charge_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentDetails()
    {
        return $this->hasOne(EePaymentDetails::className(), ['id' => 'payment_details_id']);
    }
}
