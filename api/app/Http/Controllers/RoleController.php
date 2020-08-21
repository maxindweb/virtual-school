<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json(Role::all(), 200);
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'role'  => $request->role
        ]);

        return response()->json([
            'data'  => $role
        ]);
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
