<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $TieuDe;
    public $Url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($TieuDe, $Url)
    {
        $this->TieuDe = $TieuDe;
        $this->Url = $Url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mail');
    }
}
