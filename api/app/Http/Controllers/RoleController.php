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

    /**
     * stored role to disk
     * @param Request
     */
    public function store(Request $request)
    {
        $role = Role::create([
            'role'  => $request->role
        ]);

        return response()->json([
            'data'  => $role
        ]);
    }

    /**
     * Updating role data
     * @param Request
     * @param Role
     */
    public function update(Request $request, Role $role)
    {
        $fole = Role::find($role);
        $role->role = $request['role'];
        $role->save();

        return response()->json([
            'status'    => $role,
            'message'   => $role ? 'Success Updating Role' : 'Error Updating Role'
        ]);
    }

    public function destroy()
    {
        //
    }
}
