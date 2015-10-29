<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_function_groups".
 *
 * @property integer $id
 * @property string $function_group
 * @property string $url
 * @property integer $rank
 */
class EeFunctionGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_function_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'rank'], 'required'],
            [['rank'], 'integer'],
            [['function_group'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'function_group' => 'Function Group',
            'url' => 'Url',
            'rank' => 'Rank',
        ];
    }
}
