<?php

namespace App\Repositories\Repository\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Requests\Login;
use App\Http\Requests\Register;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Repository\BaseRepository;
use App\Repositories\Interfaces\Auth\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(Register $request)
    {
        $validator = $request->validated();
        $user = User::create($validator);
        return $user;
    }

    public function login(Login $request)
    {
        $validator = $request->validated();
        return Auth::attempt($validator);
    }

    public function logout()
    {
        $user = Auth::logout();
        return $user;
    }

}

