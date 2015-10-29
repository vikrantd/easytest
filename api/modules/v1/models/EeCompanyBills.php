<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company_bills".
 *
 * @property integer $id
 * @property integer $merchant_c_id
 * @property integer $vendor_c_id
 * @property string $bill_no
 * @property string $bill_date
 * @property double $amount
 * @property integer $paid
 * @property string $payment_date
 * @property string $entry_date
 *
 * @property EeCompanyBillDetails[] $eeCompanyBillDetails
 * @property EeCompany $merchantC
 * @property EeCompany $vendorC
 */
class EeCompanyBills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_bills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_c_id'], 'required'],
            [['merchant_c_id', 'vendor_c_id', 'paid'], 'integer'],
            [['bill_date', 'payment_date', 'entry_date'], 'safe'],
            [['amount'], 'number'],
            [['bill_no'], 'string', 'max' => 50]
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
            'bill_no' => 'Bill No',
            'bill_date' => 'Bill Date',
            'amount' => 'Amount',
            'paid' => 'Paid',
            'payment_date' => 'Payment Date',
            'entry_date' => 'Entry Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyBillDetails()
    {
        return $this->hasMany(EeCompanyBillDetails::className(), ['company_bill_id' => 'id']);
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
}
