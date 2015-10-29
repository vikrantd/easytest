<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_marchent_ignore_products".
 *
 * @property integer $id
 * @property integer $c_id
 * @property integer $product_id
 */
class EeMarchentIgnoreProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_marchent_ignore_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'product_id'], 'integer']
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
            'product_id' => 'Product ID',
        ];
    }
}
