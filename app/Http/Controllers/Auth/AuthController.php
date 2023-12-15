<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Register;
use App\Http\Requests\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\Auth\AuthRepositoryInterface;

class AuthController extends Controller
{

    private $authRepository;
    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function registerView()
    {
        return view('auth.registration');
    }

    public function Registration(Register $request)
    {
        // try {
        //     DB::beginTransaction();
            $user = $this->authRepository->register($request);
            if ($user) {
                DB::commit();
                return redirect()->route('dashboard');
            }
        // } catch (\Exception $e) {
        //     DB::rollBack(); 
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }

    public function Login(Login $request)
    {
        $user = $this->authRepository->login($request);
        if($user)
        {
            return redirect()->route('dashboard')->withSuccess('You have Successfully loggedin');
        } 
        if(!$user) {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        $user = $this->authRepository->logout();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        if(Auth::user()){
            return view('dashboard');
        }
    }

}
