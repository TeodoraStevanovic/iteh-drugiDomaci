<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDogController;
use App\Models\Breed;
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


//Route::resource('dogs',DogController::class);
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}',[UserController::class, 'show'])->name('users.show');

///api/users/1/dogs
Route::post('/register', [AuthController::class, 'register']);

//Route::resource('dogs', DogController::class)->only(['index']);

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::resource('dogs', DogController::class)->only(['update','store','destroy']);

    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);


});
//u group ruti su samo one rute kojima mogu da pristupe ulogovani korisnici
Route::resource('users.dogs', UserDogController::class)->only(['index']);







