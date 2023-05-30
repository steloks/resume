<?php

namespace App\Mail;

use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\PDFController;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $pdf;
    protected $order;
    protected $invoiceId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoiceId, $pdfController, $orderId)
    {
        $this->pdf = $pdfController->invoiceStore($invoiceId);
        $this->order = Order::firstWhere('id', $orderId);
        $this->invoiceId = Invoice::firstWhere('id', $invoiceId);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mails.invoice-mail-u')->with(['order' => $this->order, 'invoice' => $this->invoiceId])->attachData($this->pdf, 'invoice.pdf', [
            'mime' => 'application/pdf',
        ]);
    }
}
