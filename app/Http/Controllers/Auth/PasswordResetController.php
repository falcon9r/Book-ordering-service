<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\PasswordReset\ForgotPasswordRequest;
use App\Http\Requests\Auth\PasswordReset\ResetPasswordRequest;
use App\Http\Requests\Auth\PasswordReset\ResetPasswordViewRequest;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetController extends Controller
{
    public function reset_password(ResetPasswordRequest $request)
    {

        $status = Password::reset(
            $request->validated(),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function reset_password_view($token ,ResetPasswordViewRequest $request)
    {
        $data = $request->validated();
        return view('auth.reset-password', ['token' => $token , 'email' => $data['email']]);
    }

    public function forgot_password(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => "Check Email"])
            : back()->withErrors(['email' => __($status)]);
    }
}
