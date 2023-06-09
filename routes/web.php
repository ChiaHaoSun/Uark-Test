<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrgsController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('', function () {
    return redirect('/login');
});

//登入
Route::get('/login', [LoginController::class, 'login']);
Route::post('/doLogin', [LoginController::class, 'doLogin']);

//建立單位
Route::get('/orgs', [OrgsController::class, 'orgs']);
Route::post('/doOrgs', [OrgsController::class, 'doOrgs']);

//建立帳號
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/doRegister', [RegisterController::class, 'doRegister']);