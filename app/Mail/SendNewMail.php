<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $guestapartment_id;
    protected $guestName;
    protected $guestEmail;
    protected $guestMessage;

    /*
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($guestName, $guestEmail, $guestMessage, $guestapartment_id)
    {
        $this->guestapartment_id = $guestapartment_id;
        $this->guestName = $guestName;
        $this->guestEmail = $guestEmail;
        $this->guestMessage = $guestMessage;
    }

    /*
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->from($this->guestEmail)->subject('titolo della mail')
        return $this->from($this->guestEmail)->markdown('email.body', ["name" => $this->guestName, "email" => $this->guestEmail, "email_content" => $this->guestMessage,
        "apartment_id" => $this->guestapartment_id]);
        //return $this->replyTo($this->guestEmail)->view('email.body', ["name" => $this->guestName, "email" => $this->guestEmail, "message" => $this->guestMessage]);
    }
}