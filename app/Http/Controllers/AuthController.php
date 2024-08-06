<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        // Validating request
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Invalid field',
                'errors' => $validator->errors()
            ], 422);
        }

        // Attempt to authenticate
        $auth = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        
        if(!$auth) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        // Emang error di linter tp jalan kok :D
        $token = auth()->user()->createToken('auth')->plainTextToken;

        return response()->json([
            'message' => 'Login success',
            'token' => $token,
            'user' => [
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'role' => auth()->user()->role,
            ] 
        ]);
    }

    public function register(Request $request) {
         // Validating request
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Invalid field',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'user',
        ]);

        return response()->json([
            'message' => 'User successfully created',
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ]
        ]);
    }
}
