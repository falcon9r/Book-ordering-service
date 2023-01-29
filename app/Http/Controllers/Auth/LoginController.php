<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login\LoginRequest;
use App\Repositories\User\UserRepositoryContract;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function  show()
    {
        return view("auth.login");
    }

    public function login(LoginRequest $request , UserRepositoryContract $userRepositoryContract)
    {
        $data = $request->validated();
        $user = $userRepositoryContract->login($data['email'] , $data['password']);
        if($user == null)
        {
            return redirect()->route('login')->withErrors(['Attempt' => 'Attempt failed']);
        }
        else
        {
            $remember = $request->has('remember') ? true : false;
            Auth::login($user , $remember);
        }
    }
}
