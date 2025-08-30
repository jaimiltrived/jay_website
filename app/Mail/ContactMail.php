<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $messageContent;

    public function __construct($name, $messageContent)
    {
        $this->name = $name;
        $this->messageContent = $messageContent;
    }

    public function build()
    {
        return $this->view('emails.contact')
                    ->subject('Thank you for contacting us!')
                    ->with([
                        'name' => $this->name,
                        'messageContent' => $this->messageContent
                    ]);
    }
}

