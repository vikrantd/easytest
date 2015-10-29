<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company".
 *
 * @property integer $c_id
 * @property string $companyname
 * @property string $brandname
 * @property string $pan
 * @property string $tin
 * @property string $cst
 * @property string $lst
 * @property string $vat
 * @property integer $purchasetax
 * @property string $companyweb
 * @property string $branddescription
 * @property integer $sell_channel
 * @property integer $company_edi_user_id
 * @property integer $pos_enabled
 * @property integer $pos_c_id
 *
 * @property EeAddress[] $eeAddresses
 * @property EeAddress[] $eeAddresses0
 * @property EeBankdetails[] $eeBankdetails
 * @property EeCarrierCredentials[] $eeCarrierCredentials
 * @property EeUsers $companyEdiUser
 * @property EeCompany $posC
 * @property EeCompany[] $eeCompanies
 * @property EeCompanyBills[] $eeCompanyBills
 * @property EeCompanyBills[] $eeCompanyBills0
 * @property EeCompanyBrandDiscount[] $eeCompanyBrandDiscounts
 * @property EeCompanyCategories[] $eeCompanyCategories
 * @property EeCompanyFeed[] $eeCompanyFeeds
 * @property EeCompanyInvoiceGroup[] $eeCompanyInvoiceGroups
 * @property EeCompanyInvoiceGroupDetails[] $eeCompanyInvoiceGroupDetails
 * @property EeCompanyInvoices[] $eeCompanyInvoices
 * @property EeCompanyInvoices[] $eeCompanyInvoices0
 * @property EeCompanyProduct[] $eeCompanyProducts
 * @property EeManifest[] $eeManifests
 * @property EeMarketplaces[] $eeMarketplaces
 * @property EeMarketplacesCredentials[] $eeMarketplacesCredentials
 * @property EeMerchantCookieConfiguration[] $eeMerchantCookieConfigurations
 * @property EeMerchantProductListings[] $eeMerchantProductListings
 * @property EePayments[] $eePayments
 * @property EePaymentsNotImported[] $eePaymentsNotImporteds
 * @property EeProductMapping[] $eeProductMappings
 * @property EeSuborders[] $eeSuborders
 * @property EeSuborders[] $eeSuborders0
 * @property EeTempFile[] $eeTempFiles
 * @property EeUsers[] $eeUsers
 * @property EeUsers[] $eeUsers0
 * @property EeVendorOrderIntraction[] $eeVendorOrderIntractions
 */
class EeCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchasetax', 'sell_channel', 'company_edi_user_id', 'pos_enabled', 'pos_c_id'], 'integer'],
            [['pos_enabled'], 'required'],
            [['companyname', 'brandname', 'pan', 'cst', 'lst', 'vat'], 'string', 'max' => 30],
            [['tin'], 'string', 'max' => 20],
            [['companyweb'], 'string', 'max' => 320],
            [['branddescription'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'companyname' => 'Companyname',
            'brandname' => 'Brandname',
            'pan' => 'Pan',
            'tin' => 'Tin',
            'cst' => 'Cst',
            'lst' => 'Lst',
            'vat' => 'Vat',
            'purchasetax' => 'Purchasetax',
            'companyweb' => 'Companyweb',
            'branddescription' => 'Branddescription',
            'sell_channel' => 'Sell Channel',
            'company_edi_user_id' => 'Company Edi User ID',
            'pos_enabled' => 'Pos Enabled',
            'pos_c_id' => 'Pos C ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeAddresses()
    {
        return $this->hasMany(EeAddress::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeAddresses0()
    {
        return $this->hasMany(EeAddress::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeBankdetails()
    {
        return $this->hasMany(EeBankdetails::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCarrierCredentials()
    {
        return $this->hasMany(EeCarrierCredentials::className(), ['merchant_c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyEdiUser()
    {
        return $this->hasOne(EeUsers::className(), ['id' => 'company_edi_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosC()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'pos_c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanies()
    {
        return $this->hasMany(EeCompany::className(), ['pos_c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyBills()
    {
        return $this->hasMany(EeCompanyBills::className(), ['merchant_c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyBills0()
    {
        return $this->hasMany(EeCompanyBills::className(), ['vendor_c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyBrandDiscounts()
    {
        return $this->hasMany(EeCompanyBrandDiscount::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyCategories()
    {
        return $this->hasMany(EeCompanyCategories::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyFeeds()
    {
        return $this->hasMany(EeCompanyFeed::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyInvoiceGroups()
    {
        return $this->hasMany(EeCompanyInvoiceGroup::className(), ['company_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyInvoiceGroupDetails()
    {
        return $this->hasMany(EeCompanyInvoiceGroupDetails::className(), ['company_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyInvoices()
    {
        return $this->hasMany(EeCompanyInvoices::className(), ['merchant_c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyInvoices0()
    {
        return $this->hasMany(EeCompanyInvoices::className(), ['vendor_c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyProducts()
    {
        return $this->hasMany(EeCompanyProduct::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeManifests()
    {
        return $this->hasMany(EeManifest::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeMarketplaces()
    {
        return $this->hasMany(EeMarketplaces::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeMarketplacesCredentials()
    {
        return $this->hasMany(EeMarketplacesCredentials::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeMerchantCookieConfigurations()
    {
        return $this->hasMany(EeMerchantCookieConfiguration::className(), ['merchant_c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeMerchantProductListings()
    {
        return $this->hasMany(EeMerchantProductListings::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEePayments()
    {
        return $this->hasMany(EePayments::className(), ['company_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEePaymentsNotImporteds()
    {
        return $this->hasMany(EePaymentsNotImported::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeProductMappings()
    {
        return $this->hasMany(EeProductMapping::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSuborders()
    {
        return $this->hasMany(EeSuborders::className(), ['company_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSuborders0()
    {
        return $this->hasMany(EeSuborders::className(), ['vendor_c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeTempFiles()
    {
        return $this->hasMany(EeTempFile::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeUsers()
    {
        return $this->hasMany(EeUsers::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeUsers0()
    {
        return $this->hasMany(EeUsers::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeVendorOrderIntractions()
    {
        return $this->hasMany(EeVendorOrderIntraction::className(), ['c_id' => 'c_id']);
    }
}
