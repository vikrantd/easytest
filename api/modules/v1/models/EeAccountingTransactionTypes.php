<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_accounting_transaction_types".
 *
 * @property integer $id
 * @property string $transaction_type
 * @property string $desc
 *
 * @property EeAccountingConfigurations[] $eeAccountingConfigurations
 */
class EeAccountingTransactionTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_accounting_transaction_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transaction_type', 'desc'], 'required'],
            [['transaction_type', 'desc'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transaction_type' => 'Transaction Type',
            'desc' => 'Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeAccountingConfigurations()
    {
        return $this->hasMany(EeAccountingConfigurations::className(), ['transaction_type' => 'id']);
    }
}
