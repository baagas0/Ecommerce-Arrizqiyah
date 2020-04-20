<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Site;
use Illuminate\Http\Request;

class Subscription extends Mailable
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
        $data['app_name'] = config('APP_NAME');
        $data['app_url'] = config('APP_URL');
        $data['site'] = Site::find('1');
        $data['email'] = $request->email;

        return $this->from('Admin@gmail.com')
                   ->subject('New Subscription')
                   ->view('login.emails.subscription')
                   ->with($data);
    }
}
