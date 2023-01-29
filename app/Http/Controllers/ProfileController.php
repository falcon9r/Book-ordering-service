<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\PhotoRequest;
use App\Http\Requests\Profile\UpdateRequest;
use App\Models\User\User;
use App\Repositories\User\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $userRepositoryContract;
    
    public function __construct(UserRepositoryContract $userRepositoryContract)
    {
        $this->userRepositoryContract = $userRepositoryContract;    
    }

    public function profile()
    {
        return view('profile' , [
            'user' => Auth::user()
        ]);
    }

    public function settings()
    {
        return view('settings' , [
            'user' => Auth::user()
        ]);
    }

    public function update(UpdateRequest $request)
    {
        $data = $request->validated();
        $this->userRepositoryContract->update($data);
        session()->flash('success', 'Success personal data update');
        return redirect()->route('settings');
    }

    public  function settings_photo(PhotoRequest $request)
    {
        $this->userRepositoryContract->uploadPhoto($request);
        session()->flash('success', 'Success upload');
        return redirect()->route('settings');
    }
}
