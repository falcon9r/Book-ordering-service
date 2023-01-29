<?php

namespace App\Repositories\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;

interface UserRepositoryContract
{
    public function create($data);

    public function login($email , $password);
}