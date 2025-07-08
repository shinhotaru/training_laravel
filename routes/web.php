<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserWalkingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('training')->group(function () {
    // Route::get('user', 'UserController@index');
    Route::resource('user', UserController::class);
});


Route::get('/hello', [HelloController::class, 'index']); 
Route::get('/hello_world', [HelloWorldController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);

Route::resource('user-walkings', UserWalkingController::class);

Route::get('user-walkings/filter', [UserWalkingController::class, 'filter'])->name('user-walkings.filter');
 