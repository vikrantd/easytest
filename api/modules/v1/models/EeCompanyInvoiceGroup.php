<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company_invoice_group".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $description
 * @property string $invoice_offset_number
 *
 * @property EeCompany $company
 * @property EeCompanyInvoiceGroupDetails[] $eeCompanyInvoiceGroupDetails
 */
class EeCompanyInvoiceGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_invoice_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'description'], 'required'],
            [['company_id'], 'integer'],
            [['description', 'invoice_offset_number'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'description' => 'Description',
            'invoice_offset_number' => 'Invoice Offset Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(EeCompany::className(), ['c_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEeCompanyInvoiceGroupDetails()
    {
        return $this->hasMany(EeCompanyInvoiceGroupDetails::className(), ['company_invoice_group_id' => 'id']);
    }
}
