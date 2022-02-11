<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CooperationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // private $offerData;
    // public function __construct($offerData)
    public function __construct()
    {
        // $this->offerData = $offerData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from(env('MAIL_FROM_ADDRESS'))
                   ->view('backend.cooperation.email')
                   ->subject('Kerjasama CV Pesona Plesiran Indonesia -')
                   ->with(
                    [
                        'nama' => 'Pesona Plesiran Indonesia',
                        'website' => 'www.plesiranindonesia.com',
                    ]);
    }
}
