<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_manifest_images".
 *
 * @property integer $id
 * @property integer $manifest_id
 * @property integer $uploader_id
 * @property integer $file_id
 * @property string $upload_time
 *
 * @property EeManifest $manifest
 * @property EeUsers $uploader
 * @property EeFiles $file
 */
class EeManifestImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_manifest_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manifest_id', 'uploader_id', 'file_id'], 'integer'],
            [['upload_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'manifest_id' => 'Manifest ID',
            'uploader_id' => 'Uploader ID',
            'file_id' => 'File ID',
            'upload_time' => 'Upload Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManifest()
    {
        return $this->hasOne(EeManifest::className(), ['id' => 'manifest_id']);
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
    public function getFile()
    {
        return $this->hasOne(EeFiles::className(), ['id' => 'file_id']);
    }
}
