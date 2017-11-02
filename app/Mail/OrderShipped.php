<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Bill;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $billtomail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(Bill $billtomail)
    {
        $this->billtomail = $billtomail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.mail')
                   ->with([
                       'bill_id' => $this->billtomail->id,
                       'date_order' => $this->billtomail->date_order,
                       'total' => $this->billtomail->total,
                       'address' => $this->billtomail->order_address,
                   ]);
    }
}
