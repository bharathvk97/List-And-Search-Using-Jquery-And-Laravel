<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'getlist']);
Route::get('/search', [UserController::class, 'search'])->name('users.searchData');