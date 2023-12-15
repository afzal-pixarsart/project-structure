<?php


namespace App\Repositories\Interfaces\Auth;

use App\Http\Requests\Login;
use App\Http\Requests\Register;

interface AuthRepositoryInterface
{
    public function register(Register $request);
    public function login(Login $request);
    // public function logOut();
}