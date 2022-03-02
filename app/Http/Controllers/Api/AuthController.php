<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $token = auth()->guard('jwt')->attempt($credentials);

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        return response()->json([
            'access_token' => $token,
            'expires_in' => config('jwt.ttl'),
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'access_token' => auth()->guard('jwt')->refresh(),
            'expires_in' => config('jwt.ttl'),
        ]);
    }
}
