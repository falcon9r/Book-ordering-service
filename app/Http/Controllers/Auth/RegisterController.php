<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\RegisterRequest;
use App\Repositories\User\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request , UserRepositoryContract $userRepositoryContract)
    {
        $data = $request->validated();
        $user = $userRepositoryContract->create($data);
        Auth::login($user);
    }
}
