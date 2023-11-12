<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from(env('INFO_MAIL_FROM_ADDRESS'), env('INFO_MAIL_FROM_NAME'))
                   ->view('emails.TestMail');
                //    ->with(
                //     [
                //         'nama' => 'Diki Alfarabi Hadi',
                //         'website' => 'www.malasngoding.com',
                //     ]);
    }
}
