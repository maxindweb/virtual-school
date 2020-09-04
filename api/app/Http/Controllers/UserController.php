<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|unique:users',
            'email'     => 'required|email',
            'password'  => 'required|min:8|',
            'role_id'   => 'rquired'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        $data = $request->only('email', 'name', 'role_id');
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        return response()->json([
            'user' => $user
        ]);
    }

    //
    public function login(Request $request)
    {
        $status  = 401;
        $response = ['error' => 'Unauthorised'];

        //if user login success
        if(Auth::attemt($request->only(['username', 'email']))){
            $status = 200;
            $user = Auth::user();
            $response = [
                'user'  => Auth::user(),
                'token' => Auth::user()->createToken()->accessToken()
            ];

            //return login status
            return response()->json($status, $response);
        }
    }

    public function update(Request $request, $id)
    {
        //validated data from user rwquest
        $validator = Validator::make($request->all(), [
            'email'   => 'required',
            'name'    => 'required|unique:users'
        ]);

        if($validator->fails()){
            return response()->json([
                'error'     => $validator->error()
            ]);
        }

        $user = User::find($id); //find user by id
        $user->name  = $request['name'];
        $user->email = $request['email'];
        $user->update(); //
        

        return response()->json([
            'status'       => (bool) $user,
            'message'      => $user ? 'Success Updated User' : 'Error Updating User'
        ]);
    }

    public function destroy(User $user)
    {
        $status = $user->delete();

        return response()->json([
            'status'    => (bool) $status,
            'messahe'   => $status ? 'Success Deleted User' : 'Error Deleting User'
        ]);
    }
}
