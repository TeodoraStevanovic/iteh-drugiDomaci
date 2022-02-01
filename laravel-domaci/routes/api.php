<?php

use App\Http\Controllers\DogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}',[UserController::class, 'show'])->name('users.show');
Route::resource('users.dogs', UserDogController::class)->only(['index']);





//Route::get('/users/{id}/dogs', [UserDogController::class, 'index'])->name('users.dogs.index');

///api/users/1/dogs

