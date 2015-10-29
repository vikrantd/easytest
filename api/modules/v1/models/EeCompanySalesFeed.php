<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company_sales_feed".
 *
 * @property integer $id
 * @property integer $company_feed_id
 * @property string $order_id
 * @property string $order_date
 * @property integer $quantity
 * @property integer $tax
 * @property integer $total_amount
 * @property string $add_time
 *
 * @property EeCompanyFeed $companyFeed
 */
class EeCompanySalesFeed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_sales_feed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_feed_id', 'quantity', 'tax', 'total_amount'], 'integer'],
            [['order_date', 'add_time'], 'safe'],
            [['order_id'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_feed_id' => 'Company Feed ID',
            'order_id' => 'Order ID',
            'order_date' => 'Order Date',
            'quantity' => 'Quantity',
            'tax' => 'Tax',
            'total_amount' => 'Total Amount',
            'add_time' => 'Add Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyFeed()
    {
        return $this->hasOne(EeCompanyFeed::className(), ['id' => 'company_feed_id']);
    }
}
