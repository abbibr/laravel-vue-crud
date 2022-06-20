<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [UserController::class, 'index']);
Route::post('/store', [UserController::class, 'store']);
Route::get('/edit/user/{user}', [UserController::class, 'edit']);
Route::post('/edit/update/{user}', [UserController::class, 'update']);
Route::post('/destroy/{user}', [UserController::class, 'destroy']);

Route::get('{any?}', function() {
    return view('welcome');
})->where('any', '.*');
