<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_marketplaces_credentials".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $marketplace_id
 * @property integer $c_id
 * @property string $store_url
 * @property integer $active
 * @property integer $import_listing
 * @property integer $inventory_live
 * @property integer $tally_integrated
 *
 * @property EeMarketplaces $marketplace
 * @property EeCompany $c
 */
class EeMarketplacesCredentials extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_marketplaces_credentials';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marketplace_id', 'c_id', 'active', 'import_listing', 'inventory_live', 'tally_integrated'], 'integer'],
            [['active', 'inventory_live'], 'required'],
            [['username'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 30],
            [['store_url'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'marketplace_id' => 'Marketplace ID',
            'c_id' => 'C ID',
            'store_url' => 'Store Url',
            'active' => 'Active',
            'import_listing' => 'Import Listing',
            'inventory_live' => 'Inventory Live',
            'tally_integrated' => 'Tally Integrated',
        ];
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
    public function getC()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'c_id']);
    }
}
