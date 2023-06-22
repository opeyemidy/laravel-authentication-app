<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/account');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|email|unique:users',
            'full_name' => 'required',
            // 'passport_data' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        return redirect('/')->with('success', 'Registration successful! You can now login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully.']);
    }
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');

        // Check if the current password is correct
        if (!Hash::check($currentPassword, $user->password)) {
            return response()->json(['error' => 'The current password is incorrect.'], 422);
        }

        // Update the user's password
        $user->password = Hash::make($newPassword);
        $user->save();

        return response()->json(['message' => 'Password updated successfully.']);
    }
}
