<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Apicontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Open Routes


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

Route::get('/', function () {
    return view('index');
});
Route::get('/registerauth', function () {
    return view('registerauth');
});
/*Route::get('/loginauth', function () {
    return view('loginauth');
});*/

Auth::routes();

Route::post('/home', [App\Http\Controllers\Api\Apicontroller::class, 'login'])->name('login');
Route::post('/register', [App\Http\Controllers\Api\Apicontroller::class, 'register'])->name('register');
Route::get('/logout', [App\Http\Controllers\Api\Apicontroller::class, 'logout'])->name('logout');
