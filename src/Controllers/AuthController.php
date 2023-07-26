<?php

namespace Abdelrhman\Chat\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $insert = User::create($data);
        $token = $insert->createToken('token');
        return ['token' => $token->plainTextToken];
    }

    public function login(Request $request) : array {
        if (Auth::attempt($request->all())){
            $user = Auth::user();
            dd(Auth::user());
            $token =  $user->createToken('MyApp');
            return ['token' => $token->plainTextToken];
        }
        return [];
    }
}
