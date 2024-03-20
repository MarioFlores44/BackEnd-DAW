<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return response()->json(auth()->user());
        }

        return response()->json([
            'message' => 'Invalid login details',
        ], 401);
    }

    function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create($request->only('name', 'email', 'password'));

        return response()->json($user);
    }

    function user(Request $request)
    {
        return response()->json(auth()->user());
    }
}
