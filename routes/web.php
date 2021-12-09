<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\PostController;
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
//CheckSession = Redirects to Dashboard when logged in.
// AuthMiddleWare = Checks if user is Authenticated if so redirects to dashboard.


Route::get('/',function()
{
    return redirect('/register');
})->middleware('CheckSession');
Route::get('/register',[UserController::class,'register'])->middleware('CheckSession');
Route::post('/register',[UserController::class,'store']);
Route::get('/login',[UserController::class,'create'])->middleware('CheckSession');
Route::post('/login',[UserController::class,'authenticate']);
Route::get('/dashboard',[UserController::class,'dashboard'])->middleware('AuthMiddleware');
Route::post('/logout',[UserController::class,'logout'])->middleware('AuthMiddleware');
Route::get('/create',[PostController::class,'index'])->middleware('AuthMiddleware');
Route::post('/create',[PostController::class,'create'])->middleware('AuthMiddleware');
Route::get('/post/{id}',[PostController::class,'show'])->middleware('AuthMiddleware');

