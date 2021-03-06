<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class AuthenticateController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only("name", "password");
        $validator = Validator::make($credentials, [
            'name' => 'required',
            'password' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        if (!$token = JWTAuth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])
        ) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 120
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'access_token' => JWTAuth::refresh(),
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    public function me()
    {
        return response()->json(
            JWTAuth::user()
        );
    }
}
