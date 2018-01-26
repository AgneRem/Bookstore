<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservationConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    protected $reservation;
    protected $author;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reservation, $author)
    {
        $this->reservation = $reservation;
        $this->author = $author;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('email.reservation')->with([

        'name' => $this->reservation->user->name,
        'title' => $this->reservation->title,
        'author' => $this->author->first_name.' '.$this->author->last_name
      ]);
    }
}
