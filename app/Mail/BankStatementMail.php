<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use PDF;

class BankStatementMail extends Mailable
{
    use Queueable, SerializesModels;

    public $transactions, $user;

    public function __construct($transactions, $user)
    {
        $this->transactions = $transactions;
        $this->user = $user;
    }

    public function build()
    {
        // Generate PDF using a view
        $pdf = PDF::loadView('emails.bank_statement_pdf', [
            'transactions' => $this->transactions,
            'user' => $this->user,
        ]);

        return $this->subject('Your Bank Statement')
                    ->view('emails.bank_statement')
                    ->attachData($pdf->output(), 'BankStatement.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
