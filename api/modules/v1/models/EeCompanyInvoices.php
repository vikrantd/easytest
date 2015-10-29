<?php
namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_company_invoices".
 *
 * @property integer $id
 * @property integer $merchant_c_id
 * @property integer $vendor_c_id
 * @property string $invoice_no
 * @property string $reference_num
 * @property string $invoice_date
 * @property double $amount
 * @property double $shipping_charge
 * @property double $miscelleneous
 * @property double $vat
 * @property integer $paid
 * @property string $payment_date
 * @property string $entry_date
 * @property integer $status
 *
 * @property EeCompanyInvoiceDetails[] $eeCompanyInvoiceDetails
 * @property EeCompany $merchantC
 * @property EeCompany $vendorC
 * @property EeInvoiceStatus $status0
 * @property EeInvoicesTickets[] $eeInvoicesTickets
 */
class EeCompanyInvoices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_invoices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_c_id', 'vendor_c_id', 'paid', 'status'], 'integer'],
            [['invoice_date', 'payment_date', 'entry_date'], 'safe'],
            [['amount', 'shipping_charge', 'miscelleneous', 'vat'], 'number'],
            [['invoice_no', 'reference_num'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_c_id' => 'Merchant C ID',
            'vendor_c_id' => 'Vendor C ID',
            'invoice_no' => 'Invoice No',
            'reference_num' => 'Reference Num',
            'invoice_date' => 'Invoice Date',
            'amount' => 'Amount',
            'shipping_charge' => 'Shipping Charge',
            'miscelleneous' => 'Miscelleneous',
            'vat' => 'Vat',
            'paid' => 'Paid',
            'payment_date' => 'Payment Date',
            'entry_date' => 'Entry Date',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyInvoiceDetails()
    {
        return $this->hasMany(EeCompanyInvoiceDetails::className(), ['company_invoice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchantC()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'merchant_c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorC()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'vendor_c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(EeInvoiceStatus::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeInvoicesTickets()
    {
        return $this->hasMany(EeInvoicesTickets::className(), ['invoice_id' => 'id']);
    }
}
