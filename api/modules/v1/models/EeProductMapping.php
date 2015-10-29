<?php
namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_product_mapping".
 *
 * @property integer $id
 * @property integer $prev_product_id
 * @property integer $updated_product_id
 * @property integer $c_id
 *
 * @property EeProducts $prevProduct
 * @property EeProducts $updatedProduct
 * @property EeCompany $c
 */
class EeProductMapping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_product_mapping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prev_product_id', 'updated_product_id', 'c_id'], 'required'],
            [['prev_product_id', 'updated_product_id', 'c_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prev_product_id' => 'Prev Product ID',
            'updated_product_id' => 'Updated Product ID',
            'c_id' => 'C ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrevProduct()
    {
        return $this->hasOne(EeProducts::className(), ['id' => 'prev_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedProduct()
    {
        return $this->hasOne(EeProducts::className(), ['id' => 'updated_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'c_id']);
    }
}
