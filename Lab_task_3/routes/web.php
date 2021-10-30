<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserAuthorization;
use App\Http\Middleware\AdminAuthorization;

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

Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome');

Route::get('/login',[UserController::class,'login'])->name('login');

Route::post('/login',[UserController::class,'loginSubmit']);

Route::get('/registration',[UserController::class,'registration'])->name('userRegistration');

Route::post('/registration',[UserController::class,'registrationSubmit']);

Route::get('/user/dash',[UserController::class,'dashboard'])->name('dashboard')->middleware('UserAuthorization');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/Adminlogin',[AdminController::class,'AdminLogin'])->name('Adminlogin');

Route::post('/Adminlogin',[AdminController::class,'loginSubmit']);

Route::get('/admin/userlist',[AdminController::class,'UserList'])->name('userlist')->middleware('AdminAuthorization');

Route::get('/admin/edit/{userId}',[AdminController::class,'Edit'])->name('Edit')->middleware('AdminAuthorization');

Route::post('/admin/edit/{userId}',[AdminController::class,'EditSubmit'])->middleware('AdminAuthorization');

Route::get('/adminlogout',[AdminController::class,'logout'])->name('adminlogout');









