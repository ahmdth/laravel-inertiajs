<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Inertia\Inertia;


Route::get('/', function () {
  return inertia('Home');
});

Route::get("/login", [LoginController::class, "create"])->name("login");
Route::post("/login", [LoginController::class, "store"]);

Route::middleware("auth")->group(function () {
  Route::post("logout", [LogoutController::class, 'logout'])->name('logout');
  Route::resource('users', UserController::class);
});

Route::get('/settings', function () {
  return inertia('Settings');
});
