<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_cookie_type".
 *
 * @property integer $id
 * @property string $type
 */
class EeCookieType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_cookie_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }
}
