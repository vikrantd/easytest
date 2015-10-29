<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_suborders".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $company_id
 * @property integer $vendor_c_id
 * @property string $reference_code
 * @property string $awb_number
 * @property string $suborder_num
 * @property string $order_date
 * @property string $notes
 * @property string $selling_price
 * @property string $imei_serial
 * @property string $invoicecode
 * @property double $commission
 * @property double $shipping_cost
 * @property double $payment_gateway
 * @property double $cost
 * @property double $mrp
 * @property integer $quantity
 * @property string $import_date
 * @property integer $paid
 * @property integer $company_product_id
 * @property integer $listing_id
 * @property integer $status_id
 * @property integer $courier_id
 * @property integer $manifest_id
 *
 * @property EeApiQueue[] $eeApiQueues
 * @property EeCompanyBillDetails[] $eeCompanyBillDetails
 * @property EeInvoiceDetailsAdjustments[] $eeInvoiceDetailsAdjustments
 * @property EeReturnHistory[] $eeReturnHistories
 * @property EeSuborderMpCharges[] $eeSuborderMpCharges
 * @property EeOrders $order
 * @property EeCompany $company
 * @property EeCompany $vendorC
 * @property EeCompanyProduct $companyProduct
 * @property EeOrderStatus $status
 * @property EeManifest $manifest
 * @property EeCarriers $courier
 * @property EeCompanyProductListings $listing
 * @property EeSubordersTickets[] $eeSubordersTickets
 * @property EeVendorOrderIntraction[] $eeVendorOrderIntractions
 */
class EeSuborders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_suborders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'company_id', 'vendor_c_id', 'quantity', 'paid', 'company_product_id', 'listing_id', 'status_id', 'courier_id', 'manifest_id'], 'integer'],
            [['order_date', 'import_date'], 'safe'],
            [['notes'], 'required'],
            [['commission', 'shipping_cost', 'payment_gateway', 'cost', 'mrp'], 'number'],
            [['reference_code', 'selling_price', 'imei_serial', 'invoicecode'], 'string', 'max' => 100],
            [['awb_number'], 'string', 'max' => 50],
            [['suborder_num'], 'string', 'max' => 20],
            [['notes'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'company_id' => 'Company ID',
            'vendor_c_id' => 'Vendor C ID',
            'reference_code' => 'Reference Code',
            'awb_number' => 'Awb Number',
            'suborder_num' => 'Suborder Num',
            'order_date' => 'Order Date',
            'notes' => 'Notes',
            'selling_price' => 'Selling Price',
            'imei_serial' => 'Imei Serial',
            'invoicecode' => 'Invoicecode',
            'commission' => 'Commission',
            'shipping_cost' => 'Shipping Cost',
            'payment_gateway' => 'Payment Gateway',
            'cost' => 'Cost',
            'mrp' => 'Mrp',
            'quantity' => 'Quantity',
            'import_date' => 'Import Date',
            'paid' => 'Paid',
            'company_product_id' => 'Company Product ID',
            'listing_id' => 'Listing ID',
            'status_id' => 'Status ID',
            'courier_id' => 'Courier ID',
            'manifest_id' => 'Manifest ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeApiQueues()
    {
        return $this->hasMany(EeApiQueue::className(), ['suborder_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyBillDetails()
    {
        return $this->hasMany(EeCompanyBillDetails::className(), ['marketplaces_order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeInvoiceDetailsAdjustments()
    {
        return $this->hasMany(EeInvoiceDetailsAdjustments::className(), ['suborder_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeReturnHistories()
    {
        return $this->hasMany(EeReturnHistory::className(), ['marketplace_order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSuborderMpCharges()
    {
        return $this->hasMany(EeSuborderMpCharges::className(), ['suborder_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(EeOrders::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'company_id']);
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
    public function getCompanyProduct()
    {
        return $this->hasOne(EeCompanyProduct::className(), ['id' => 'company_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(EeOrderStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManifest()
    {
        return $this->hasOne(EeManifest::className(), ['id' => 'manifest_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourier()
    {
        return $this->hasOne(EeCarriers::className(), ['id' => 'courier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListing()
    {
        return $this->hasOne(EeCompanyProductListings::className(), ['id' => 'listing_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSubordersTickets()
    {
        return $this->hasMany(EeSubordersTickets::className(), ['suborder_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeVendorOrderIntractions()
    {
        return $this->hasMany(EeVendorOrderIntraction::className(), ['marketplace_order_id' => 'id']);
    }
}
