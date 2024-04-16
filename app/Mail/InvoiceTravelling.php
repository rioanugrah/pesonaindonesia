<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;
class InvoiceTravelling extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $details;
    public $pdf;

    public function __construct($details,$pdf)
    {
        $this->details = $details;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->view('view.name');
    // }
    public function build()
    {
        // return $this->view('view.name');
        // return $this->subject($this->details['title'])
        //             ->from(env('MAIL_FROM_ADDRESS'),$this->details['title'])
        //             ->markdown('emails.InvoiceTravelling')->with('details', $this->details);
        // return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        //             ->subject($this->details['title'])
        //             ->markdown('emails.InvoiceTravelling')->with('details', $this->details);

        // $pdf = PDF::loadView('emails.invoiceTravelling', ['details' => $this->details]);
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject($this->details['title'])
                    ->attachData($this->pdf->output(), "invoice.pdf");
                    // ->markdown('emails.InvoiceTravelling')->with('details', $this->details);
    }
}
