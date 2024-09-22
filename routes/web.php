<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'create'])->name('users.create');
Route::post('/store-user', [UserController::class, 'store'])->name('users.store');
