<?php

use App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::post('register', [V1\RegisterController::class, 'store']);
Route::post('login', [V1\AuthController::class, 'login']);
