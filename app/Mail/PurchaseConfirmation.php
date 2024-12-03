<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class PurchaseConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $accounts;
    /**
     * Create a new message instance.
     */
    public function __construct($order, $accounts)
    {
        $this->order = $order;
        $this->accounts = $accounts;
    }
    public function build()
    {
        return $this->view('emails.purchase-confirmation')
            ->subject('Purchase Confirmation')
            ->with(['accounts' => $this->accounts]);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Purchase Confirmation',
        );
    }
}
