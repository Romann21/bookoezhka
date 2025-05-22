<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|unique:users|min:3',
            'password' => 'required|min:6',
            'name' => 'required|regex:/^[А-Яа-яЁё\s]+$/u',
            'surname' => 'required|regex:/^[А-Яа-яЁё\s]+$/u',
            'patronymic' => 'nullable|regex:/^[А-Яа-яЁё\s]+$/u',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $user = User::create([
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        
        Auth::login($user);
        
        return redirect('/');
    }
    
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        
        return back()->withErrors([
            'login' => 'Неверные учетные данные.',
        ]);
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}