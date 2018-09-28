<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DefaultMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * data to be used in the view
     *
     * @var array
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.email')
            ->with(['html'=>$this->data['content']])
            ->to("kiran.reddy@clariontechnologies.co.in")
            ->subject($this->data['subject'])
            // ->replyTo('noreply.rma@kpodj.com', 'KPODJ Returns')
            // ->from($this->data['cc'])
            ->from("kiran.reddy@clariontechnologies.co.in");
            // ->from($this->data['from']);
    }
}
