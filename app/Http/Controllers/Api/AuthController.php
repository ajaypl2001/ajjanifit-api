<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
            'role'     => User::GYM_OWNER,
            'status'   => true,
        ]);

        $token = $user->createToken('gym-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Registration successful',
            'token'   => $token,
            'user'    => $user
        ], 201);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1
        ])) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials']
            ]);
        }

        $user = Auth::user();

        $token = $user->createToken('gym-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'token'   => $token,
            'user'    => $user
        ]);
    }

    public function profile(Request $request)
    {
        $user_id = $request->user_id;

        $user = User::find($user_id);

        return response()->json([
            'success' => true,
            'user_id' => $user_id,
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout successful'
        ]);
    }
}