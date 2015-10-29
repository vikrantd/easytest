<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_listing_status".
 *
 * @property integer $id
 * @property string $description
 *
 * @property EeCompanyProductListings[] $eeCompanyProductListings
 */
class EeListingStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_listing_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyProductListings()
    {
        return $this->hasMany(EeCompanyProductListings::className(), ['listing_status_id' => 'id']);
    }
}
