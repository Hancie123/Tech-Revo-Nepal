<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexcontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\AdminAuthController;
use App\Models\Admin;

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
Route::post('/login',[AdminAuthController::class,'logincheck']);

Route::get('/registration',[admincontroller::class,'admin']);
Route::post('/registration',[admincontroller::class,'registrationcheck']);
Route::get('/admin/delete/{id}',[admincontroller:: class,'delete'])->name('admin.delete');

Route::get('/customerview',[admincontroller::class,'viewadmin']);


Route::get('/admin',function(){

    $admin=Admin::all();
    echo "<pre>";
    print_r($admin->toArray());


});
