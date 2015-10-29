<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_company_invoice_group_details".
 *
 * @property integer $id
 * @property integer $company_invoice_group_id
 * @property integer $company_id
 *
 * @property EeCompany $company
 * @property EeCompanyInvoiceGroup $companyInvoiceGroup
 */
class EeCompanyInvoiceGroupDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_company_invoice_group_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_invoice_group_id', 'company_id'], 'required'],
            [['company_invoice_group_id', 'company_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_invoice_group_id' => 'Company Invoice Group ID',
            'company_id' => 'Company ID',
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
    public function getCompanyInvoiceGroup()
    {
        return $this->hasOne(EeCompanyInvoiceGroup::className(), ['id' => 'company_invoice_group_id']);
    }
}
