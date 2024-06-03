<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateFacturaMailable extends Mailable
{
    use Queueable, SerializesModels;
    
    public $numeroFactura;
    public $valorFactura;
    public $nombreUsuario;

    /**
     * Create a new message instance.
     */
    public function __construct($numeroFactura, $valorFactura, $nombreUsuario)
    {
        $this->numeroFactura = $numeroFactura;
        $this->valorFactura = $valorFactura;
        $this->nombreUsuario = $nombreUsuario;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Se ha creado una nueva factura',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.crear-factura-email',
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
