<?php
namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_product_barcode".
 *
 * @property integer $id
 * @property string $barcode_no
 * @property string $ready_to_ship_no
 */
class EeProductBarcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_product_barcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['barcode_no', 'ready_to_ship_no'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'barcode_no' => 'Barcode No',
            'ready_to_ship_no' => 'Ready To Ship No',
        ];
    }
}
