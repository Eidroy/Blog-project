<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\RegisterRequest;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        try{
            $validatedUser = Validator::make($request->all(), [
                'username' => 'required',
                'name' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
            ]);

            if ($validatedUser->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $validatedUser->errors()
                ], 422);
            }

            $user = User::create([
                'username' => $request->username,
                'name' => $request->name,
                'lastname' => $request->lastname,
                'country' => $request->country ?? 'Not specified',
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function login (Request $request)
    {
        try {
            $validatedUser = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validatedUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $validatedUser->errors()
                ], 401);
            }

            if (!auth()->attempt($request->only('email', 'password'))) {
                return response()->json([
                    'message' => 'Email and/or password are incorrect. Please try again.'
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'Invalid credentials'
                ], 401);
            }

            $token = $user->createToken('auth_token')->plainTextToken;
            $user->remember_token = $token;
            $user->save();

            return response()->json([
                'message' => 'User logged in successfully',
                'user' => $user,
                'token' => $token
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
