<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $first_name =  $request->input('first_name');
        $last_name = $request->input('last_name');
        $email_address = $request->input('email_address');
        $subject_message = $request->input('subject_message');
        $body_message = $request->input('body_message');
        $this->view('mail')->with('first_name',$first_name)->with('last_name',$last_name)
        ->with('email_address',$email_address)
        ->with('body_message',$body_message)
        ->to('rajiv.metalmusic85@gmail.com')->subject($subject_message);
    }
}
