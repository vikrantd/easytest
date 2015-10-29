<?php
namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_payments".
 *
 * @property integer $id
 * @property integer $marketplace_id
 * @property integer $company_id
 * @property string $settelment_number
 * @property double $amount
 * @property string $start_date
 * @property string $end_date
 * @property string $payment_date
 * @property string $date_time
 * @property integer $confirm
 * @property string $confirmation_date
 * @property integer $user_id
 *
 * @property EePaymentDetails[] $eePaymentDetails
 * @property EeMarketplaces $marketplace
 * @property EeCompany $company
 */
class EePayments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_payments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marketplace_id', 'settelment_number', 'amount', 'payment_date', 'confirmation_date', 'user_id'], 'required'],
            [['marketplace_id', 'company_id', 'confirm', 'user_id'], 'integer'],
            [['amount'], 'number'],
            [['start_date', 'end_date', 'payment_date', 'date_time', 'confirmation_date'], 'safe'],
            [['settelment_number'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marketplace_id' => 'Marketplace ID',
            'company_id' => 'Company ID',
            'settelment_number' => 'Settelment Number',
            'amount' => 'Amount',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'payment_date' => 'Payment Date',
            'date_time' => 'Date Time',
            'confirm' => 'Confirm',
            'confirmation_date' => 'Confirmation Date',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEePaymentDetails()
    {
        return $this->hasMany(EePaymentDetails::className(), ['payment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketplace()
    {
        return $this->hasOne(EeMarketplaces::className(), ['id' => 'marketplace_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'company_id']);
    }
}
