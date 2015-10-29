<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_invoice_details_adjustments".
 *
 * @property integer $id
 * @property integer $invoice_detail_id
 * @property integer $suborder_id
 * @property string $adjustment_date
 * @property double $amount
 * @property double $shipping_charges
 * @property double $miscelleneous
 * @property double $promotion_amount
 * @property double $promotion_amount_tax
 * @property double $tax
 * @property string $add_time
 *
 * @property EeCompanyInvoiceDetails $invoiceDetail
 * @property EeSuborders $suborder
 */
class EeInvoiceDetailsAdjustments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_invoice_details_adjustments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_detail_id', 'suborder_id'], 'integer'],
            [['adjustment_date', 'add_time'], 'safe'],
            [['amount', 'shipping_charges', 'miscelleneous', 'promotion_amount', 'promotion_amount_tax', 'tax'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_detail_id' => 'Invoice Detail ID',
            'suborder_id' => 'Suborder ID',
            'adjustment_date' => 'Adjustment Date',
            'amount' => 'Amount',
            'shipping_charges' => 'Shipping Charges',
            'miscelleneous' => 'Miscelleneous',
            'promotion_amount' => 'Promotion Amount',
            'promotion_amount_tax' => 'Promotion Amount Tax',
            'tax' => 'Tax',
            'add_time' => 'Add Time',
        ];
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
    public function getSuborder()
    {
        return $this->hasOne(EeSuborders::className(), ['id' => 'suborder_id']);
    }
}
