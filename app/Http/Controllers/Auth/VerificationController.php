<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


class VerificationController extends Controller
{
        public function verify(EmailVerificationRequest $request)
        {
            $request->fulfill();
            return redirect('/home');
        }
        public  function notification(Request $request)
        {
            $request->user()->sendEmailVerificationNotification();
            return back()->with('message', 'Verification link sent!');
        }
}
