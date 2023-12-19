<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;  
use Spatie\Permission\Models\Role;  


class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create()
    {
        $permissions = Permission::get();
        $roles = Role::get();
        return view('users.create', compact('permissions', 'roles'));
    }

    public function store(Request $request)
    {
        // dd('controller');
        $request->validate([
            'name' =>'required',
            'email'=> 'required|unique:users,email,id',
            'password' => 'required',
            'role' => 'required',
            'permission' => 'array',
        ]);
        try {
            DB::beginTransaction();
            $this->userRepository->store($request);
            DB::commit();
            return redirect()->route('list-user')->withSuccess('Record Successfully Created');
        } catch (\Exception $e) {
            DB::rollBack(); 
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function list()
    {
        $users = $this->userRepository->list();
        return view('users.list', compact('users'));
    }

    public function edit(Request $request)
    {
        $user = $this->userRepository->edit($request);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email'=> 'required',
           
        ]);
        try {
            DB::beginTransaction();
            $this->userRepository->update($request);
            DB::commit();
            return redirect()->route('list-user')->withSuccess('Record Successfully Updated');
        } catch (\Exception $e) {
            DB::rollBack(); 
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        $this->userRepository->delete($request);
        return back();
    } 
}
