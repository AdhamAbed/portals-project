<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $user;
    public $hiddenCode;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$user,$hiddenCode)
    {
        //
        $this->name = $name;
        $this->user = $user;
        $this->hiddenCode = $hiddenCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(__('cp.Reset Password Email For').$this->name)->view('emails.reset')->with(['message' => $this]);
    }
}
