<?php

namespace App\Repositories\Repository;

use Carbon\Carbon;
Use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;  
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->role);
        // dd($request->permissions);
        $user = User::create($request->all());
        $user->roles()->attach($request->role);
        
        if ($request->permissions) {
            $user->permissions()->attach($request->permissions);
        }
        
        return $user;
    }   

    public function list()
    {
        $users = User::paginate(5);
        return $users;
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return $user;
    }

    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        // $user->syncRole($request->type);
        return $user;
    }

    public function delete(Request $request)
    {
        $user = User::where('id', $request->id)->delete();
        return $user;
    }
}
