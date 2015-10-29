<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_marketplaces".
 *
 * @property integer $id
 * @property string $name
 * @property integer $c_id
 * @property integer $rank
 * @property integer $clustering_rank
 * @property integer $active
 * @property integer $inventory_update_active
 * @property integer $crawl_enabled
 * @property integer $max_api_attempt
 * @property string $last_inventory_run_time
 * @property string $last_price_run_time
 * @property string $last_addListing_run_time
 * @property string $ico_url
 * @property integer $partner_type
 *
 * @property EeAccountingConfigurations[] $eeAccountingConfigurations
 * @property EeCompanyCategories[] $eeCompanyCategories
 * @property EeCompanyProductListings[] $eeCompanyProductListings
 * @property EeDates[] $eeDates
 * @property EeManifest[] $eeManifests
 * @property EeCompany $c
 * @property EeMarketplacesCredentials[] $eeMarketplacesCredentials
 * @property EeMerchantCookieConfiguration[] $eeMerchantCookieConfigurations
 * @property EeMerchantProductListings[] $eeMerchantProductListings
 * @property EeMpCatAttributes[] $eeMpCatAttributes
 * @property EeMpCategories[] $eeMpCategories
 * @property EeOrders[] $eeOrders
 * @property EePayments[] $eePayments
 * @property EePaymentsNotImported[] $eePaymentsNotImporteds
 */
class EeMarketplaces extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_marketplaces';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'rank', 'clustering_rank', 'active', 'inventory_update_active', 'crawl_enabled', 'max_api_attempt', 'partner_type'], 'integer'],
            [['active', 'crawl_enabled', 'max_api_attempt'], 'required'],
            [['last_inventory_run_time', 'last_price_run_time', 'last_addListing_run_time'], 'safe'],
            [['name'], 'string', 'max' => 30],
            [['ico_url'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'c_id' => 'C ID',
            'rank' => 'Rank',
            'clustering_rank' => 'Clustering Rank',
            'active' => 'Active',
            'inventory_update_active' => 'Inventory Update Active',
            'crawl_enabled' => 'Crawl Enabled',
            'max_api_attempt' => 'Max Api Attempt',
            'last_inventory_run_time' => 'Last Inventory Run Time',
            'last_price_run_time' => 'Last Price Run Time',
            'last_addListing_run_time' => 'Last Add Listing Run Time',
            'ico_url' => 'Ico Url',
            'partner_type' => 'Partner Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeAccountingConfigurations()
    {
        return $this->hasMany(EeAccountingConfigurations::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyCategories()
    {
        return $this->hasMany(EeCompanyCategories::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyProductListings()
    {
        return $this->hasMany(EeCompanyProductListings::className(), ['marketplaceID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeDates()
    {
        return $this->hasMany(EeDates::className(), ['marketplace_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeManifests()
    {
        return $this->hasMany(EeManifest::className(), ['Marketplace_id' => 'id']);
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
    public function getEeMarketplacesCredentials()
    {
        return $this->hasMany(EeMarketplacesCredentials::className(), ['marketplace_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeMerchantCookieConfigurations()
    {
        return $this->hasMany(EeMerchantCookieConfiguration::className(), ['marketplace_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeMerchantProductListings()
    {
        return $this->hasMany(EeMerchantProductListings::className(), ['marketplace_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeMpCatAttributes()
    {
        return $this->hasMany(EeMpCatAttributes::className(), ['marketplace_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeMpCategories()
    {
        return $this->hasMany(EeMpCategories::className(), ['marketplace_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeOrders()
    {
        return $this->hasMany(EeOrders::className(), ['marketplace_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEePayments()
    {
        return $this->hasMany(EePayments::className(), ['marketplace_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEePaymentsNotImporteds()
    {
        return $this->hasMany(EePaymentsNotImported::className(), ['marketplace_id' => 'id']);
    }
}
