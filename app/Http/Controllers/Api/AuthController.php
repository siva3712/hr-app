<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'emp_id' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to authenticate the user
        if (!Auth::attempt($request->only('emp_id', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Generate a new token for the authenticated user
        // $user = Auth::user()->where('emp_id', $request->emp_id)->first();
        $user = User::where('emp_id', $request->emp_id)->first();
        $token = $user()->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ], 200);
    }
    //
}
