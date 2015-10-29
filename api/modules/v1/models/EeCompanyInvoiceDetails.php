<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_company_invoice_details".
 *
 * @property integer $id
 * @property integer $company_invoice_id
 * @property integer $suborder_id
 * @property integer $brand_id
 * @property integer $product_id
 * @property double $mrp
 * @property double $cost
 * @property double $shipping_charge
 * @property double $miscelleneous
 * @property double $vat
 *
 * @property EeCompanyInvoices $companyInvoice
 * @property EeBrands $brand
 * @property EeProducts $product
 * @property EeInvoiceDetailsAdjustments[] $eeInvoiceDetailsAdjustments
 * @property EePaymentDetails[] $eePaymentDetails
 */
class EeCompanyInvoiceDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_invoice_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_invoice_id', 'suborder_id', 'brand_id', 'product_id'], 'integer'],
            [['mrp', 'cost', 'shipping_charge', 'miscelleneous', 'vat'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_invoice_id' => 'Company Invoice ID',
            'suborder_id' => 'Suborder ID',
            'brand_id' => 'Brand ID',
            'product_id' => 'Product ID',
            'mrp' => 'Mrp',
            'cost' => 'Cost',
            'shipping_charge' => 'Shipping Charge',
            'miscelleneous' => 'Miscelleneous',
            'vat' => 'Vat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyInvoice()
    {
        return $this->hasOne(EeCompanyInvoices::className(), ['id' => 'company_invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(EeBrands::className(), ['brand_id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(EeProducts::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeInvoiceDetailsAdjustments()
    {
        return $this->hasMany(EeInvoiceDetailsAdjustments::className(), ['invoice_detail_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEePaymentDetails()
    {
        return $this->hasMany(EePaymentDetails::className(), ['invoice_detail_id' => 'id']);
    }
}
