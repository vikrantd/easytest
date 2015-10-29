<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_bankdetails".
 *
 * @property integer $b_id
 * @property string $bankname
 * @property string $beneficiaryname
 * @property string $accountno
 * @property string $accounttype
 * @property string $ifsccode
 * @property string $branchname
 * @property integer $c_id
 *
 * @property EeCompany $c
 */
class EeBankdetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_bankdetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id'], 'integer'],
            [['bankname', 'beneficiaryname', 'branchname'], 'string', 'max' => 40],
            [['accountno', 'accounttype'], 'string', 'max' => 30],
            [['ifsccode'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'b_id' => 'B ID',
            'bankname' => 'Bankname',
            'beneficiaryname' => 'Beneficiaryname',
            'accountno' => 'Accountno',
            'accounttype' => 'Accounttype',
            'ifsccode' => 'Ifsccode',
            'branchname' => 'Branchname',
            'c_id' => 'C ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'c_id']);
    }
}
