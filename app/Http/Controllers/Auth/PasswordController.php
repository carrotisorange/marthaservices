<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function postEmail(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

/*
        //Send email to Merchant about this joined
        Mail::send('emails.join_confirmation_merchant', ['user' => $user, 'shop' => $shop], function ($m) use ($user, $shop) {
            $m->from('support@buzzrefer.com', 'BuzzRefer.com');
            $m->replyTo($user->email, $user->get_fullname());
            $m->to($shop->email, $shop->name)->subject($user->get_fullname().' joined your referral program');
        });*/



    }

    /**
     * Get the Closure which is used to build the password reset email message.
     *
     * @return \Closure
     */
    protected function resetEmailBuilder(){
        return function (Message $message) {
            $message->from(get_option('email_address'), 'Reset your '.get_option('site_name').' password');
            $message->subject($this->getEmailSubject());
        };
    }


    public function redirectPath()
    {
       return route('dashboard');
    }


}
