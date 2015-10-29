<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_merchant_product_listings".
 *
 * @property integer $id
 * @property integer $c_id
 * @property string $seller_SKU
 * @property string $GUID
 * @property integer $inventory
 * @property double $mrp
 * @property double $selling_price
 * @property integer $marketplace_id
 * @property integer $marketplace_cat_id
 * @property integer $mpc_cat_id
 * @property integer $listing_import_status_id
 * @property integer $company_product_listing_id
 * @property string $LIVE
 * @property integer $feed_dump_id
 * @property string $add_time
 * @property string $update_time
 *
 * @property EeCompany $c
 * @property EeMarketplaces $marketplace
 * @property EeListingImportStatus $listingImportStatus
 * @property EeMasterProductCategories $mpcCat
 * @property EeCompanyProductListings $companyProductListing
 * @property EeMpCategories $marketplaceCat
 */
class EeMerchantProductListings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_merchant_product_listings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'inventory', 'marketplace_id', 'marketplace_cat_id', 'mpc_cat_id', 'listing_import_status_id', 'company_product_listing_id', 'feed_dump_id'], 'integer'],
            [['seller_SKU', 'GUID'], 'required'],
            [['mrp', 'selling_price'], 'number'],
            [['add_time', 'update_time'], 'safe'],
            [['seller_SKU', 'LIVE'], 'string', 'max' => 50],
            [['GUID'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c_id' => 'C ID',
            'seller_SKU' => 'Seller  Sku',
            'GUID' => 'Guid',
            'inventory' => 'Inventory',
            'mrp' => 'Mrp',
            'selling_price' => 'Selling Price',
            'marketplace_id' => 'Marketplace ID',
            'marketplace_cat_id' => 'Marketplace Cat ID',
            'mpc_cat_id' => 'Mpc Cat ID',
            'listing_import_status_id' => 'Listing Import Status ID',
            'company_product_listing_id' => 'Company Product Listing ID',
            'LIVE' => 'Live',
            'feed_dump_id' => 'Feed Dump ID',
            'add_time' => 'Add Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketplace()
    {
        return $this->hasOne(EeMarketplaces::className(), ['id' => 'marketplace_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListingImportStatus()
    {
        return $this->hasOne(EeListingImportStatus::className(), ['id' => 'listing_import_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMpcCat()
    {
        return $this->hasOne(EeMasterProductCategories::className(), ['id' => 'mpc_cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyProductListing()
    {
        return $this->hasOne(EeCompanyProductListings::className(), ['id' => 'company_product_listing_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketplaceCat()
    {
        return $this->hasOne(EeMpCategories::className(), ['id' => 'marketplace_cat_id']);
    }
}
