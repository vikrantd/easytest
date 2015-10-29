<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_carriers".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $max_api_attempt
 *
 * @property EeCarrierCredentials[] $eeCarrierCredentials
 * @property EeManifest[] $eeManifests
 * @property EeSuborders[] $eeSuborders
 */
class EeCarriers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_carriers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id', 'max_api_attempt'], 'integer'],
            [['name'], 'string', 'max' => 50]
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
            'parent_id' => 'Parent ID',
            'max_api_attempt' => 'Max Api Attempt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCarrierCredentials()
    {
        return $this->hasMany(EeCarrierCredentials::className(), ['carrier_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeManifests()
    {
        return $this->hasMany(EeManifest::className(), ['carrier_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSuborders()
    {
        return $this->hasMany(EeSuborders::className(), ['courier_id' => 'id']);
    }
}
