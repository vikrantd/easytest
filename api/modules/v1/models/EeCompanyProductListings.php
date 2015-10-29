<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company_product_listings".
 *
 * @property integer $id
 * @property integer $company_product_id
 * @property integer $feed_dump_id
 * @property integer $listing_status_id
 * @property string $sku
 * @property double $mrp
 * @property double $selling_price
 * @property integer $quantity
 * @property double $merchant_payout
 * @property double $shipping_cost
 * @property double $commission
 * @property double $commission_service_tax
 * @property double $pmt_gateway_charge
 * @property string $site_uid
 * @property string $listing_ref_number
 * @property string $UID
 * @property integer $marketplaceID
 * @property integer $confirmed
 *
 * @property EeApiQueue[] $eeApiQueues
 * @property EeMarketplaces $marketplace
 * @property EeListingStatus $listingStatus
 * @property EeCompanyProduct $companyProduct
 * @property EeMerchantProductListings[] $eeMerchantProductListings
 * @property EeSuborders[] $eeSuborders
 */
class EeCompanyProductListings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_product_listings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_product_id', 'feed_dump_id', 'listing_status_id', 'quantity', 'marketplaceID', 'confirmed'], 'integer'],
            [['mrp', 'selling_price', 'merchant_payout', 'shipping_cost', 'commission', 'commission_service_tax', 'pmt_gateway_charge'], 'number'],
            [['quantity', 'marketplaceID'], 'required'],
            [['sku'], 'string', 'max' => 500],
            [['site_uid', 'listing_ref_number', 'UID'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_product_id' => 'Company Product ID',
            'feed_dump_id' => 'Feed Dump ID',
            'listing_status_id' => 'Listing Status ID',
            'sku' => 'Sku',
            'mrp' => 'Mrp',
            'selling_price' => 'Selling Price',
            'quantity' => 'Quantity',
            'merchant_payout' => 'Merchant Payout',
            'shipping_cost' => 'Shipping Cost',
            'commission' => 'Commission',
            'commission_service_tax' => 'Commission Service Tax',
            'pmt_gateway_charge' => 'Pmt Gateway Charge',
            'site_uid' => 'Site Uid',
            'listing_ref_number' => 'Listing Ref Number',
            'UID' => 'Uid',
            'marketplaceID' => 'Marketplace ID',
            'confirmed' => 'Confirmed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeApiQueues()
    {
        return $this->hasMany(EeApiQueue::className(), ['listing_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketplace()
    {
        return $this->hasOne(EeMarketplaces::className(), ['id' => 'marketplaceID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListingStatus()
    {
        return $this->hasOne(EeListingStatus::className(), ['id' => 'listing_status_id']);
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
    public function getEeMerchantProductListings()
    {
        return $this->hasMany(EeMerchantProductListings::className(), ['company_product_listing_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSuborders()
    {
        return $this->hasMany(EeSuborders::className(), ['listing_id' => 'id']);
    }
}
