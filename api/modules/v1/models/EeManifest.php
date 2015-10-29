<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_manifest".
 *
 * @property integer $id
 * @property integer $carrier_id
 * @property integer $c_id
 * @property string $manifest_no
 * @property string $date_time
 * @property integer $Marketplace_id
 *
 * @property EeCarriers $carrier
 * @property EeCompany $c
 * @property EeMarketplaces $marketplace
 * @property EeManifestImages[] $eeManifestImages
 * @property EeSuborders[] $eeSuborders
 */
class EeManifest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_manifest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['carrier_id', 'c_id', 'Marketplace_id'], 'integer'],
            [['date_time'], 'safe'],
            [['manifest_no'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'carrier_id' => 'Carrier ID',
            'c_id' => 'C ID',
            'manifest_no' => 'Manifest No',
            'date_time' => 'Date Time',
            'Marketplace_id' => 'Marketplace ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarrier()
    {
        return $this->hasOne(EeCarriers::className(), ['id' => 'carrier_id']);
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
        return $this->hasOne(EeMarketplaces::className(), ['id' => 'Marketplace_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeManifestImages()
    {
        return $this->hasMany(EeManifestImages::className(), ['manifest_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSuborders()
    {
        return $this->hasMany(EeSuborders::className(), ['manifest_id' => 'id']);
    }
}
