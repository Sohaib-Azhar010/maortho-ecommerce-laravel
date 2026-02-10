<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectToGoogle()
    {
        // Check if Google OAuth credentials are configured
        if (empty(config('services.google.client_id')) || empty(config('services.google.client_secret'))) {
            \Log::error('Google OAuth credentials not configured');
            return redirect()->route('login')->with('error', 'Google authentication is not properly configured. Please contact the administrator.');
        }

        try {
            return \Laravel\Socialite\Facades\Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            \Log::error('Google redirect failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('login')->with('error', 'Failed to initiate Google authentication. Please try again.');
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = \Laravel\Socialite\Facades\Socialite::driver('google')->user();
            
            // Validate that we got the required user data
            if (empty($googleUser->email)) {
                \Log::error('Google authentication failed: No email provided', [
                    'user_data' => $googleUser,
                ]);
                return redirect()->route('login')->with('error', 'Google authentication failed: Email address is required.');
            }
            
            $user = User::updateOrCreate([
                'email' => $googleUser->email,
            ], [
                'name' => $googleUser->name ?? $googleUser->email,
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar ?? null,
                'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(24)), // Random password for social users
                'role' => 'user',
            ]);

            Auth::login($user);

            return redirect()->route('home');
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            // This usually happens when the OAuth state doesn't match (CSRF protection)
            \Log::warning('Google OAuth state mismatch', [
                'error' => $e->getMessage(),
            ]);
            return redirect()->route('login')->with('error', 'Google authentication session expired. Please try again.');
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // HTTP client errors (4xx)
            \Log::error('Google OAuth HTTP error', [
                'error' => $e->getMessage(),
                'response' => $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null,
            ]);
            return redirect()->route('login')->with('error', 'Google authentication failed. Please check your Google OAuth configuration.');
        } catch (\Exception $e) {
            // Log the actual error for debugging
            \Log::error('Google authentication failed', [
                'error' => $e->getMessage(),
                'class' => get_class($e),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return redirect()->route('login')->with('error', 'Google authentication failed. Please try again or use email/password to login.');
        }
    }
}
