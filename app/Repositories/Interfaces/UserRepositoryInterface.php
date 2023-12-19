<?php


namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;    

interface UserRepositoryInterface
{
    public function store(Request $request);
    public function list();
    public function edit(Request $request);
    public function update(Request $request);
    public function delete(Request $request);
}