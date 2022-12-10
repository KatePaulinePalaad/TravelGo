<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public $location,$checkin,$checkout,$price,$stay,$place,$adult,$children;

    public function __construct($location,$checkin,$checkout,$price,$stay,$place,$adult,$children)
    {
        $this->location = $location;
        $this->checkin = $checkin;
        $this->checkin = $checkin;
        $this->checkout = $checkout;
        $this->price = $price;
        $this->stay = $stay;
        $this->place = $place;
        $this->children = $children;
        $this->adult = $adult;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Official Receipt',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // public function content()
    // {
    //     return new Content(
    //         markdown: 'emails.receipt',
    //         with:[
    //             'location' =>  $this->location,
    //             'checkin' =>  $this->from,
    //             'checkout' => $this->checkout,
    //             'price' => $this->price,
    //             'stay' => $this->stay,
    //             'place' => $this->place
    //         ]
    //     );
    // }

    public function build()
    {
        return $this->markdown('emails.receipt',[
                'location' =>  $this->location,
                'from' =>  $this->from,
                'checkin' =>  $this->from,
                'checkout' => $this->checkout,
                'price' => $this->price,
                'stay' => $this->stay,
                'place' => $this->place,
                'adult' => $this->adult,
                'children' => $this->children
        ]);

    }
}
