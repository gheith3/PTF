<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function confirmPin(string $token)
    {
        if (!$token){
            abort('404');
        }
        $user = User::where('auth_update_token', $token)->first();
        if (!$user){
            abort('404');
        }
        return view('auth.confirm-pin', ['user' => $user]);
    }
}
