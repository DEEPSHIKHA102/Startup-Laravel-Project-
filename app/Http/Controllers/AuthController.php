<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mock user data for demonstration
    private $users = [
        'corporate' => [
            'paldeepshikha102@gmail.com' => [
                'password' => '123456789a',
                'name' => 'Tech Giant Inc.',
                'id' => 1,
                'industry' => 'Technology',
                'description' => 'Global technology leader'
            ]
        ],
        'startup' => [
            'paldeepshikha102@gmail.com' => [
                'password' => '123456789a',
                'name' => 'Innovative Startup LLC',
                'id' => 1,
                'industry' => 'FinTech',
                'description' => 'Revolutionizing payments',
                'stage' => 'Series A',
                'founders' => ['Jane Smith', 'John Doe'],
                'founded_year' => 2020,
                'pitch_deck' => 'https://example.com/pitch.pdf'
            ]
        ]
    ];

    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login attempt
    public function login(Request $request)
    {
        $request->validate([
            'user_type' => 'required|in:corporate,startup',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password', 'user_type');
        
        // Check if user exists in mock data
        if (!isset($this->users[$credentials['user_type']][$credentials['email']])) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
        
        $user = $this->users[$credentials['user_type']][$credentials['email']];
        
        // Check password (in real app, use Hash::check)
        if ($user['password'] !== $credentials['password']) {
            return back()->withErrors(['password' => 'Invalid password']);
        }
        
        // Store user in session
        session([
            'user_type' => $credentials['user_type'],
            'user_id' => $user['id'],
            'user_name' => $user['name'],
            'authenticated' => true
        ]);
        
        return redirect()->route($credentials['user_type'] . '.dashboard');
    }

    // Show registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'user_type' => 'required|in:corporate,startup',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users', // In real app, check DB
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'accepted'
        ]);

        // In a real app, you would create the user here
        // For this demo, we'll just redirect to login with success message
        
        return redirect()->route('login')
            ->with('success', 'Registration successful! Please login.');
    }

    // Handle logout
    public function logout()
    {
        session()->flush();
        return redirect()->route('home');
    }

    // Show forgot password form
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    // Handle forgot password request
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // In a real app, you would send a password reset link here
        // For this demo, we'll just return with status
        
        return back()->with('status', 'Password reset link sent to your email!');
    }

    // Show password reset form
    public function showResetPassword(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    // Handle password reset
    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // In a real app, you would reset the password here
        // For this demo, we'll just redirect to login
        
        return redirect()->route('login')
            ->with('status', 'Password reset successfully!');
    }
}