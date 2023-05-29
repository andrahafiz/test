<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuctionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $pelanggan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pelanggan, $details)
    {
        $this->details = $details;
        $this->pelanggan = $pelanggan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Lelang Gas PGN')
            ->view('emailku');
    }
}
