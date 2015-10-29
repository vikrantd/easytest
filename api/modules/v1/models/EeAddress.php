<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_address".
 *
 * @property integer $a_id
 * @property string $street
 * @property string $city
 * @property integer $state_id
 * @property string $country
 * @property string $zip
 * @property integer $c_id
 * @property integer $type_id
 *
 * @property EeCompany $c
 * @property EeCompany $c0
 */
class EeAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_id', 'c_id', 'type_id'], 'integer'],
            [['c_id'], 'required'],
            [['street'], 'string', 'max' => 200],
            [['city', 'country'], 'string', 'max' => 30],
            [['zip'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'a_id' => 'A ID',
            'street' => 'Street',
            'city' => 'City',
            'state_id' => 'State ID',
            'country' => 'Country',
            'zip' => 'Zip',
            'c_id' => 'C ID',
            'type_id' => 'Type ID',
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
    public function getC0()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'c_id']);
    }
}
