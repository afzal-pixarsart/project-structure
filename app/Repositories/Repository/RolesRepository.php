<?php

namespace App\Repositories\Repository;

use Carbon\Carbon;
use Spatie\Permission\Models\Role;  
use Illuminate\Http\Request;
use App\Repositories\Interfaces\RolesRepositoryInterface;

class RolesRepository implements RolesRepositoryInterface
{
    public function store(Request $request)
    {
        $role = Role::create($request->all());
        return $role;
    }

    public function list()
    {
        $roles = Role::latest('created_at')->paginate(5);
        return $roles;
    }

    public function edit(Request $request)
    {
        $role = Role::find($request->id);
        return $role;
    }

    public function update(Request $request)
    {
        $role = Role::where('id', $request->id)->update([
            'name' => $request->name
        ]);
        return $role;
    }

    public function delete(Request $request)
    {
        $role = Role::where('id', $request->id)->delete();
        return $role;
    }
}
