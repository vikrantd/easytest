<?php

namespace api\modules\v1\models;
use Yii;

/**
 * This is the model class for table "ee_files".
 *
 * @property integer $id
 * @property integer $uploader_id
 * @property string $upload_time
 * @property string $file_name
 *
 * @property EeUsers $uploader
 * @property EeManifestImages[] $eeManifestImages
 * @property EeTicketImages[] $eeTicketImages
 */
class EeFiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uploader_id'], 'integer'],
            [['upload_time'], 'safe'],
            [['file_name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uploader_id' => 'Uploader ID',
            'upload_time' => 'Upload Time',
            'file_name' => 'File Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUploader()
    {
        return $this->hasOne(EeUsers::className(), ['id' => 'uploader_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeManifestImages()
    {
        return $this->hasMany(EeManifestImages::className(), ['file_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeTicketImages()
    {
        return $this->hasMany(EeTicketImages::className(), ['file_id' => 'id']);
    }
}
