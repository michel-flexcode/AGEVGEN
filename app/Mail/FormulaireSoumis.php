<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormulaireSoumis extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;
    public $formulaireNum;

    /**
     * Create a new message instance.
     */
    public function __construct($formData, $formulaireNum)
    {
        // dd($formData);
        // dd($formulaireNum);
        $this->formData = $formData;
        $this->formulaireNum = $formulaireNum;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouveau formulaire soumis')
            // ->view('emails.formulaire-soumis')
            // ->with(['formData' => $this->formData]);
            ->with(['formData' => $this->formData, 'formulaireNum' => $this->formulaireNum]);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
