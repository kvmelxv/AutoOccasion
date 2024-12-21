<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;


    public $pdfPath;
    public function __construct($pdfPath)
    {
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->subject('Ta facture')
            ->view('emails.facture')
            ->attach($this->pdfPath);
    }
}
