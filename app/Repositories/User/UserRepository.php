<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 29.01.2023
 * Time: 13:52
 */

namespace App\Repositories\User;

use App\Models\User\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryContract
{
    public function create($data)
    {
        $data['password'] = bcrypt($data['password']);
        return User::query()->create($data);
    }

    public function login($email, $password)
    {
        $credentials = ['email' => $email, 'password' => $password];
         if(Auth::attempt($credentials)){
             return Auth::getProvider()->retrieveByCredentials($credentials);
         }
         else
         {
             return null;
         }
    }
}