<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function login(){
    $request = request();
    $credentials = [
      'email' => request('emails'),
      'password' => request('passwords')
    ];
    if (auth()->attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->intended('/');
    }
    return back()->with(['alert-error' => 'Username / Password Salah!!!']);
  }
  public function register(){
    $request = request();
    $existingUser = \App\Models\User::whereEmail(request('email'))->orWhere('phone',request('phone'))->first();
    if ($existingUser) {
      return back()->with(['alert-error' => 'Email atau Nomor HP sudah terdaftar!']);
    }

    $user = \App\Models\User::create([
      'role' => 'member',
      'name' => request('name'),
      'phone' => request('phone'),
      'email' => request('email'),
      'password' => \Hash::make(request('password')),
    ]);
    auth()->login($user);
    $request->session()->regenerate();
    return redirect()->intended('/');
  }
  public function logout() {
    auth()->logout();
    return redirect('/');
  }
}
