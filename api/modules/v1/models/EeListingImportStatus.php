<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_listing_import_status".
 *
 * @property integer $id
 * @property string $status
 * @property integer $rank
 *
 * @property EeMerchantProductListings[] $eeMerchantProductListings
 */
class EeListingImportStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_listing_import_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['rank'], 'integer'],
            [['status'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'rank' => 'Rank',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeMerchantProductListings()
    {
        return $this->hasMany(EeMerchantProductListings::className(), ['listing_import_status_id' => 'id']);
    }
}
