<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->subject('Konfirmasi Reset Password')
                    ->from(env('MAIL_FROM_ADDRESS'),'Reset Password')
                    ->view('email.konfirmasi');
                    // ->with(
                    // [
                    //     // 'nama' => 'Diki Alfarabi Hadi',
                    //     // 'website' => 'www.malasngoding.com',
                    // ]);
    }
}
