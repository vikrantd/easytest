<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_payment_details".
 *
 * @property integer $id
 * @property integer $payment_id
 * @property integer $invoice_detail_id
 * @property double $amount
 * @property string $description
 * @property string $miscellaneous
 *
 * @property EePayments $payment
 * @property EeCompanyInvoiceDetails $invoiceDetail
 * @property EeSuborderMpCharges[] $eeSuborderMpCharges
 */
class EePaymentDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_payment_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_id', 'invoice_detail_id'], 'integer'],
            [['amount'], 'number'],
            [['description', 'miscellaneous'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_id' => 'Payment ID',
            'invoice_detail_id' => 'Invoice Detail ID',
            'amount' => 'Amount',
            'description' => 'Description',
            'miscellaneous' => 'Miscellaneous',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(EePayments::className(), ['id' => 'payment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceDetail()
    {
        return $this->hasOne(EeCompanyInvoiceDetails::className(), ['id' => 'invoice_detail_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSuborderMpCharges()
    {
        return $this->hasMany(EeSuborderMpCharges::className(), ['payment_details_id' => 'id']);
    }
}
