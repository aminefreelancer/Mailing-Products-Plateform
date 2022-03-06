<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DocMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content, $subject, $attachements;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $content, $attachements)
    {
        //
        $this->subject= $subject;
        $this->content= $content;
        $this->attachements= $attachements;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail =  $this->markdown('emails.content')
                    ->from('no-reply@ghn-dz.com')
                    ->subject($this->subject)
                    ->with(['content' => $this->content]);
        foreach($this->attachments as $file){
            $mail->attach('upload/'.$file);
        }
        return $mail;
    }
}
