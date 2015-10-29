<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_inventory_adjustment".
 *
 * @property integer $id
 * @property integer $company_bill_detail_id
 * @property integer $old_inventory_status_id
 * @property integer $inventory_status_id
 * @property integer $old_product_id
 * @property integer $new_product_id
 * @property string $date_time
 * @property integer $user_id
 * @property integer $note_id
 */
class EeInventoryAdjustment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_inventory_adjustment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_bill_detail_id'], 'required'],
            [['company_bill_detail_id', 'old_inventory_status_id', 'inventory_status_id', 'old_product_id', 'new_product_id', 'user_id', 'note_id'], 'integer'],
            [['date_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_bill_detail_id' => 'Company Bill Detail ID',
            'old_inventory_status_id' => 'Old Inventory Status ID',
            'inventory_status_id' => 'Inventory Status ID',
            'old_product_id' => 'Old Product ID',
            'new_product_id' => 'New Product ID',
            'date_time' => 'Date Time',
            'user_id' => 'User ID',
            'note_id' => 'Note ID',
        ];
    }
}
