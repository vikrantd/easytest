<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_clustering_multiple_products".
 *
 * @property integer $id
 * @property integer $feed_dump_id
 * @property integer $product_id
 * @property string $add_time
 *
 * @property EeProducts $product
 */
class EeClusteringMultipleProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_clustering_multiple_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feed_dump_id', 'product_id'], 'integer'],
            [['add_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feed_dump_id' => 'Feed Dump ID',
            'product_id' => 'Product ID',
            'add_time' => 'Add Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(EeProducts::className(), ['id' => 'product_id']);
    }
}
