<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ForgotPasswordController extends Controller
{
  public function show()
  {
    return Inertia::render('Auth/ForgotPassword');
  }

  public function forgot(Request $request)
  {
    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink(
      $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
      ? redirect('/')->with(['success' => __($status)])
      : back()->withErrors(['email' => __($status)]);
  }
}
