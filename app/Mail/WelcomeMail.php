<?php

namespace App\Mail;

use App\Models\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 *
 */
class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Usuario
     */
    public $usuario;
    /**
     * Create a new message instance.
     */
    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return WelcomeMail
     */
    public function  build(){

        return $this->view('emails.welcome')
            ->subject(subject: 'Seja bem-vindo ao' . config('app.name'))
            ->to(address: $this->usuario->email)
            ->with(key: [
                'verifyEmailLink'=>config('app.url').'/verify-email?token='. $this->usuario->confirmation_token
           ]);


   }

}
