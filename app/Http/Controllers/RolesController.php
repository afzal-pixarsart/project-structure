<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\RolesRepositoryInterface;

class RolesController extends Controller
{
    private $rolesRepository;

    public function __construct(RolesRepositoryInterface $rolesRepository)
    {
        $this->rolesRepository = $rolesRepository;
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $role = $this->rolesRepository->store($request);
        return redirect()->route('list-roles')->withSuccess('Record Successfully Created');;
    }

    public function list()
    {
        $roles = $this->rolesRepository->list();
        return view('roles.list', compact('roles'));
    }

    public function edit(Request $request)
    {
        $role = $this->rolesRepository->edit($request);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request)
    {
        $role = $this->rolesRepository->update($request);
        return redirect()->route('list-roles')->withSuccess('Record Successfully Updated');
    }

    public function delete(Request $request)
    {
        $role = $this->rolesRepository->delete($request);
        return back();
    }
}
