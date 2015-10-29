<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_product_images".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $image_name
 * @property string $original_file_name
 * @property string $ebay_image_url
 */
class EeProductImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_product_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['original_file_name', 'ebay_image_url'], 'required'],
            [['image_name'], 'string', 'max' => 100],
            [['original_file_name'], 'string', 'max' => 200],
            [['ebay_image_url'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'image_name' => 'Image Name',
            'original_file_name' => 'Original File Name',
            'ebay_image_url' => 'Ebay Image Url',
        ];
    }
}
