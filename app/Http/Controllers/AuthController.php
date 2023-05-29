<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function createToken(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'sifra' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;
            return ['token' => $token, 'partner_id' => $user->partner->id];
        } else {
            return response(['error' => 'Unauthorized'], 401);
        }
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
    }
}
