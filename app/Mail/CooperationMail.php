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
        return $this->subject($this->details['title'])
                    ->from(env('MAIL_FROM_ADDRESS'),$this->details['title'])
                    ->view('email.konfirmasi');
                    // ->with(
                    // [
                    //     // 'nama' => 'Diki Alfarabi Hadi',
                    //     // 'website' => 'www.malasngoding.com',
                    // ]);
    }
}
