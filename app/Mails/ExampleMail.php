<?php
namespace App\Mails;

use App\Libraries\MailObject;
use Illuminate\Bus\Queueable;
use Illuminate\Http\File;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExampleMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $mail;

    public function __construct(MailObject $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->mail;
        $mail->validate();
        foreach ($mail->getAttachments() as $file){
            $this->attach($file);
        }
        return $this
            ->subject($mail->getSubject())
            ->from($mail->getFrom())
            ->to($mail->getTo())
            ->cc($mail->getCc())
            //->bcc($mail->getBcc())
            ->markdown($mail->getView());
    }
}