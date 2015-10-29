<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_automation_mail_configuration".
 *
 * @property integer $id
 * @property string $mail_user
 * @property string $mail_password
 * @property string $mail_host
 * @property integer $active
 */
class EeAutomationMailConfiguration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_automation_mail_configuration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active'], 'required'],
            [['active'], 'integer'],
            [['mail_user'], 'string', 'max' => 50],
            [['mail_password'], 'string', 'max' => 30],
            [['mail_host'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mail_user' => 'Mail User',
            'mail_password' => 'Mail Password',
            'mail_host' => 'Mail Host',
            'active' => 'Active',
        ];
    }
}
