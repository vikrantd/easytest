<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_catalog".
 *
 * @property integer $id
 * @property string $upload_number
 * @property string $add_date
 */
class EeCatalog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_catalog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['add_date'], 'safe'],
            [['upload_number'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'upload_number' => 'Upload Number',
            'add_date' => 'Add Date',
        ];
    }
}
