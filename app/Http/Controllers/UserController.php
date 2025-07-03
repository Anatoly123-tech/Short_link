<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:3',
        ]);
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        return redirect()->route('auth.login')->with('success', 'Вы зарегистрированы!');
    }
    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt($request->only('name', 'password')))
        {
            return redirect()->route('links.index')->with('success', 'Добро пожаловать!');
        }
        return back()->withErrors(['name'=> 'Неправильный логин или пароль']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
