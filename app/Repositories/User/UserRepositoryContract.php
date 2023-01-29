<?php

namespace App\Repositories\User;

use App\Http\Requests\Profile\PhotoRequest;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;

interface UserRepositoryContract
{
    public function create($data);

    public function login($email , $password);

    public function uploadPhoto(PhotoRequest $request);

    public function update($data);
}