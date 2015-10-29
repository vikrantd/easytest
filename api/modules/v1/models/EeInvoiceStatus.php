<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_invoice_status".
 *
 * @property integer $id
 * @property string $type
 *
 * @property EeCompanyInvoices[] $eeCompanyInvoices
 */
class EeInvoiceStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_invoice_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 40]
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyInvoices()
    {
        return $this->hasMany(EeCompanyInvoices::className(), ['status' => 'id']);
    }
}
