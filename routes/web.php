<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/',function()
{
    return view('welcome');
})->name('home');
Route::get('/login', [HomeController::class, 'index'])->name('login');
Route::post('/login', [HomeController::class, 'postLogin'])->name('login.post'); 
Route::get('/registration', [HomeController::class, 'registration'])->name('register');
Route::post('/registration', [HomeController::class, 'postRegistration'])->name('register.post'); 
//Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
