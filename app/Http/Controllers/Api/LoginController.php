<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request) {
        $credentials = $request->validate([
            'identification' => ['required','numeric','min:10'],
            'password' => 'required'
        ]);

        if(!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('identification', $request->identification)->firstOrFail();

        $token = $user->createToken($user->identification)->plainTextToken;

        return response()->json([
                'token' => $token,
                'message' => 'Success'
            ], Response::HTTP_ACCEPTED);
    }

    public function logout() {

        Auth::user()->tokens()->delete();

        return response()->json([
            'message' => 'Token deleted'
        ], Response::HTTP_OK);

    }
}
