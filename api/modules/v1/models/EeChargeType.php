<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_charge_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 *
 * @property EeSuborderMpCharges[] $eeSuborderMpCharges
 * @property EeSuborderMpCharges[] $eeSuborderMpCharges0
 */
class EeChargeType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_charge_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSuborderMpCharges()
    {
        return $this->hasMany(EeSuborderMpCharges::className(), ['charge_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeSuborderMpCharges0()
    {
        return $this->hasMany(EeSuborderMpCharges::className(), ['charge_type_id' => 'id']);
    }
}
