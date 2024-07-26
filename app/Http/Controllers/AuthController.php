<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:5|max:30|confirmed',
        ]);
    
        $data['password'] = bcrypt($data['password']);
        $data['role_id'] = Role::where('name', 'Student')->first()->id;
        $user = User::create($data);
    
        if (!$user) {
            return back()->withErrors('User creation failed');
        }
    
        Auth::login($user);
    
        if (Auth::check()) {
            return redirect(url('/home'));
        } else {
            dd('Authentication failed');
            return back()->withErrors('Authentication failed');
        }
    }
    

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:5|max:30',
        ]);

        $isLogin = Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);

        if (!$isLogin) {
            return back()->withErrors('Credentials not correct');
        }

        return redirect(url('/home'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }
}
