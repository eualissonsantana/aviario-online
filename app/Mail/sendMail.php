<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;

        return $this
               ->from('smtp@aviario.online', 'Aviário Online' )
               ->subject('Você tem uma mensagem do Aviário Online')
               ->replyTo($data['email'])
               ->to($data['destinatario'])
               ->view('aviario.contato.mensagem')
               ->with('data', $this->data);
    }
}
