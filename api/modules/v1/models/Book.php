<?php
namespace app\models;
use Yii;

class Book extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'ee_products';
    }

    public function rules()
    {
        return [
            [['id', 'cat_id', 'brand_id', 'model_no'], 'required'],
            [['id', 'cat_id'], 'integer'],            
            [['title'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['author','publisher'], 'string', 'max' => 50]
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
            }
            return true;
        }
        return false;
    }
}
