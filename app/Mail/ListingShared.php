<?php

namespace App\Mail;

use App\Models\{User, Listing};
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ListingShared extends Mailable
{
    use Queueable, SerializesModels;

    public $listing, $sender, $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Listing $listing, User $sender, $body = null)
    {
        $this->listing = $listing;
        $this->sender = $sender;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.listing.shared.message')
                    ->subject("{$this->sender->name} shared a listing with you")
                    ->from(config('classified.defaults.email'));
    }
}
