<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_accounting_configurations".
 *
 * @property integer $id
 * @property integer $c_id
 * @property integer $partner_id
 * @property string $key
 * @property string $value
 * @property integer $transaction_type
 *
 * @property EeMarketplaces $partner
 * @property EeAccountingTransactionTypes $transactionType
 */
class EeAccountingConfigurations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_accounting_configurations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'partner_id', 'transaction_type'], 'integer'],
            [['key', 'value'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c_id' => 'C ID',
            'partner_id' => 'Partner ID',
            'key' => 'Key',
            'value' => 'Value',
            'transaction_type' => 'Transaction Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartner()
    {
        return $this->hasOne(EeMarketplaces::className(), ['id' => 'partner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionType()
    {
        return $this->hasOne(EeAccountingTransactionTypes::className(), ['id' => 'transaction_type']);
    }
}
