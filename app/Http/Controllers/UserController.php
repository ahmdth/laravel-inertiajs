<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  public function index()
  {
    return Inertia::render('Users/Index', [
      'users' => User::query()
        ->when(request()->input('search'), function ($query, $search) {
          $query->where('name', 'like', "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString()
        ->through(function ($user) {
          return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => isset($user->avatar) ? asset("avatars/$user->avatar") : asset("avatars/avatar.jpg"),
          ];
        }),

      'filters' => request()->only(['search']),
    ]);
  }

  public function create()
  {
    return Inertia::render('Users/Create');
  }

  public function store(Request $request)
  {
    // vvalidate request
    $attributes = $request->validate([
      'name' => ['required'],
      'email' => ['required', 'email', 'unique:users'],
      'password' => ['required'],
      'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
    ]);
    // upload avatart image
    $filename = time() . "." . $request->avatar->getClientOriginalExtension();
    $request->avatar->move("avatars", $filename);

    User::create([
      "name" => $request->name,
      "email" => $request->email,
      "password" => $request->password,
      "avatar" => $filename
    ]);
    return redirect('/users');
  }

  public function show($id)
  {
    return Inertia::render("Users/Show", [
      'user' => User::find($id)
    ]);
  }

  public function edit(User $user)
  {
    return Inertia::render("Users/Edit", ['user' => $user]);
  }

  public function update(Request $request, User $user)
  {
    $data = $request->validate([
      'name' => ['required', 'max:90'],
      'email' => ['required', 'email'],
    ]);
    $data['password'] = $user->password;
    $user->update($data);
    return Redirect::route('users.index');
  }

  public function destroy($id)
  {
    $user = User::findOrFail($id);
    $user->deleteOrFail();
    return redirect()->route("users.index");
  }
}
