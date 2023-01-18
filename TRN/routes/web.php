<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexcontroller;

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

Route::get('/',[indexcontroller::class,'index']);

Route::get('/login',[indexcontroller::class,'login']);
