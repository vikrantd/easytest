<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company_bill_details_history".
 *
 * @property integer $id
 * @property integer $bill_item_id
 * @property integer $product_id
 * @property double $cost
 * @property string $modify_date
 */
class EeCompanyBillDetailsHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_bill_details_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bill_item_id', 'product_id', 'cost', 'modify_date'], 'required'],
            [['bill_item_id', 'product_id'], 'integer'],
            [['cost'], 'number'],
            [['modify_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bill_item_id' => 'Bill Item ID',
            'product_id' => 'Product ID',
            'cost' => 'Cost',
            'modify_date' => 'Modify Date',
        ];
    }
}
