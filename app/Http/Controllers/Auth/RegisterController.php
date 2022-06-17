<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;

class RegisterController extends Controller
{
  public function create()
  {
    return Inertia::render("Auth/Register");
  }

  public function store(Request $request)
  {
    $credentials = $request->validate([
      'name' => ['required', 'string'],
      'email' => ['required', 'email', Rule::unique('users')],
      'password' => [Password::required(), Password::min(6), Rule::unique('users'), 'confirmed'],
      'password_confirmation' => ['required']
    ]);
    User::create($credentials);
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended('/');
    }
    return redirect(route('home'))->with(['success'=> 'Your account created successfully']);
  }
}
