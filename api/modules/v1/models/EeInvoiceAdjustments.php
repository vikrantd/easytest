<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_invoice_adjustments".
 *
 * @property integer $id
 * @property integer $company_invoice_id
 * @property integer $user_id
 * @property string $description
 * @property double $amount
 * @property string $datetime
 */
class EeInvoiceAdjustments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_invoice_adjustments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_invoice_id', 'user_id'], 'integer'],
            [['amount'], 'number'],
            [['datetime'], 'safe'],
            [['description'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_invoice_id' => 'Company Invoice ID',
            'user_id' => 'User ID',
            'description' => 'Description',
            'amount' => 'Amount',
            'datetime' => 'Datetime',
        ];
    }
}
