<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Login method
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        // Attempt to log in the user
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken(env('APP_NAME'))->plainTextToken; // Generate a token
            return response()->json([
                'status' => true,
                'data' => ['token' => $token,
                'user' => $user,]
            ], 200);
        }

        return response()->json(['message' => 'Invalid credentials.'], 401);
    }

    // Logout method
    public function logout(Request $request)
    {
        Auth::user()->tokens()->delete(); // Delete all tokens for the authenticated user

        return response()->json(['message' => 'Logged out successfully.']);
    }

    // Reset Password Method
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed', // Ensure password confirmation
        ]);

        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $user->password = bcrypt($request->password); // Hash the new password
        $user->save();

        return response()->json(['message' => 'Password reset successfully.']);
    }

}
