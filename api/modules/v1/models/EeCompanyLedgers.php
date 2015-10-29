<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company_ledgers".
 *
 * @property integer $id
 * @property integer $c_id
 * @property integer $tax_type
 * @property integer $transaction_type
 * @property string $class
 * @property string $amount_ledger
 * @property string $tax_ledger
 */
class EeCompanyLedgers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_ledgers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'tax_type', 'transaction_type'], 'integer'],
            [['class', 'amount_ledger', 'tax_ledger'], 'string', 'max' => 200]
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
            'tax_type' => 'Tax Type',
            'transaction_type' => 'Transaction Type',
            'class' => 'Class',
            'amount_ledger' => 'Amount Ledger',
            'tax_ledger' => 'Tax Ledger',
        ];
    }
}
