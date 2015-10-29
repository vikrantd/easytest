<?php
namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_invoices_tickets".
 *
 * @property integer $id
 * @property integer $invoice_id
 * @property integer $ticket_id
 *
 * @property EeCompanyInvoices $invoice
 * @property EeTickets $ticket
 */
class EeInvoicesTickets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_invoices_tickets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_id', 'ticket_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_id' => 'Invoice ID',
            'ticket_id' => 'Ticket ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(EeCompanyInvoices::className(), ['id' => 'invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(EeTickets::className(), ['id' => 'ticket_id']);
    }
}
