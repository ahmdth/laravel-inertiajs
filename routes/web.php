<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;


Route::get('/', function () {
  return inertia('Home');
})->name('home');

Route::get("/login", [LoginController::class, "create"])->name("login");
Route::post("/login", [LoginController::class, "store"]);

Route::get("/register", [RegisterController::class, "create"])->name("register");
Route::post("/register", [RegisterController::class, "store"]);

Route::middleware("auth")->group(function () {
  Route::post("logout", [LogoutController::class, 'logout'])->name('logout');
  Route::resource('users', UserController::class);
});

Route::get('/settings', function () {
  return inertia('Settings');
});
