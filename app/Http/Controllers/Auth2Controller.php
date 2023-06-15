<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Auth2Controller extends Controller
{
    // ...
    public function showLoginForm()
    {
        $title = 'Login';
        $action = route('login.post'); // Ganti dengan nama route yang sesuai
        return view('auth.login2', compact('title', 'action'));
    }
    
    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            if (Auth::user()->role === 'customer') {
                return redirect()->route('home.index');
            } elseif (Auth::user()->role === 'owner') {
                return redirect()->route('dasboard');
            } elseif (Auth::user()->role === 'admin') {
                return redirect()->route('admin');
            }
        }

        // Login gagal
        return redirect()->back()->withErrors(['message' => 'Email atau password salah']);
    }

    public function showRegistrationForm()
    {
    // Ganti dengan nama route yang sesuai
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $role = request()->input('role');
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:customer,admin,owner',
        ], [
            'email.required' => 'Email Tidak Valid',
            'password.required' => 'Password tidak sesuai / kurang dari 6 karakter'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $role
        ]);

        Auth::login($user);
        if (Auth::user()->role === 'customer') {
            return redirect()->route('home.index');
        } elseif (Auth::user()->role === 'owner') {
            return redirect()->route('dasboard');
        } elseif (Auth::user()->role === 'admin') {
            return redirect()->route('admin');
        }
    }
    public function logout()
    {
        Auth:: logout();
        return redirect()->to('/auth');
    }
}

