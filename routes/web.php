<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

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

Route::get('/', function() {
    if(auth()->guest()) {
        return redirect('/login');
    }

    return view('pages.home');
});

Route::get('/login',[AuthController::class, 'loginForm'])->name('login');
Route::post('/login',[AuthController::class,'login']);


Route::get('/dashboard',[AuthController::class,'dashboard']);

Route::group(['middleware'=>'auth'],function(){
    Route::get('/movie/create',[MovieController::class,'create']);
    Route::movie('/movies',[MovieController::class,'store']);
    Route::get('/movies/my-movies',[MovieController::class,'mymovies']);
    Route::get('/movies/recent-movies',[MovieController::class,'recentmovies']);

    Route::get('/movies/{movie}',[MovieController::class,'show']);

    Route::get('/logout',[AuthController::class,'logout']);

    Route::get('/movies/edit/{movie}',[MovieController::class,'edit'])->middleware('can-edit');
    Route::put('/movies/{movie}',[MovieController::class,'update'])->middleware('can-edit');


});
