<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
//            'password' => ['required', 'confirmed', Password::default()],
            'password' => ['required', 'confirmed'],
            'role' => ['required',Rule::in(['SAISIE', 'COMMERCIAL','CONTROL1','CONTROL2','ADMIN','USER'])],
            'device_name' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return [
            'name' => $user->name,
            'username' => $user->username,
            'role' => $user->role,
            'token' => $user->createToken($request->device_name)->plainTextToken,
        ];
    }

    public function login(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();
        $allowedRoles = false;

        if($request->device_name == 'mobile'){
            $allowedRoles = in_array($user->role, ['CONTROL1','CONTROL2', 'USER']);
        }
        if($request->device_name == 'web'){
            $allowedRoles = in_array($user->role, ['ADMIN', 'USER']);
        }

        if (! $user || ! Hash::check($request->password, $user->password) || ! $allowedRoles) {
            throw ValidationException::withMessages([
                'message' => ['Les identifiants fournis sont incorrects.'],
            ]);
        }

        return [
            'name' => $user->name,
            'username' => $user->username,
            'role' => $user->role,
            'token' => $user->createToken($request->device_name)->plainTextToken,
        ];

    }

    public function logout(Request $request){
        $user = User::where('username', $request->username)->first();

        if($user) {
            $user->tokens()->delete();
        }
        return response()->noContent();
    }

    public function find(String $username){
        $user = User::select('name','username','role')->where('username', $username)->first();

        if($user) {
           return $user;
        }
        return response()->noContent();
    }
}
