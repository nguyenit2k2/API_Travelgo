<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt($validatedData['password']),
            'token' => bin2hex(random_bytes(32)),
        ]);

        return response()->json([
            
            'user' => $user,
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $token = bin2hex(random_bytes(32));
            $user_id = $user->id;
            $user->token = $token;
            $user->save();

            return response()->json([
                'user'=> $user_id
            ]);
        }

        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }
    public function logout(Request $request)
    {
        
        $user = User::where('id',$request->input('user'))->first();
        $tokenForget = $user->token;
        $user->token = null;
        $user->save();

        return response()->json(['success' => true]);
}
}