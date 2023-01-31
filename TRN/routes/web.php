<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexcontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoomExpensesController;
use App\Http\Controllers\TRNFinanceController;
use App\Http\Controllers\TRNProjectController;
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
Route::post('/',[ContactController::class,'storecontact']);



Route::get('/login',[indexcontroller::class,'login']);
Route::post('/login',[AdminAuthController::class,'logincheck']);

Route::get('/registration',[admincontroller::class,'admin']);
Route::post('/registration',[admincontroller::class,'registrationcheck']);
Route::get('/admin/delete/{id}',[admincontroller:: class,'delete'])->name('admin.delete');

Route::get('/customerview',[admincontroller::class,'viewadmin']);


Route::get('/home/dashboard',[AdminAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/home/dashboard/logout',[AdminAuthController::class,'logout']);
Route::get('/home/profile',[ProfileController::class,'profile'])->middleware('isLoggedIn');




Route::get('/home/passwords',[indexcontroller::class,'password'])->middleware('isLoggedIn');
Route::post('/home/passwords',[PasswordController::class,'password']);
Route::get('/home/passwords',[PasswordController::class,'viewpassword'])->name('home.passwords');
Route::get('/home/passwords/{id}',[PasswordController::class,'deletepassword']);


Route::get('/home/notes',[NotesController::class,'Notes'])->middleware('isLoggedIn')->name('home.notes');
Route::post('/home/notes',[NotesController::class,'storenotes'])->middleware('isLoggedIn')->name('home.notes');
Route::get('/home/view_notes/',[NotesController::class,'ViewNotes'])->middleware('isLoggedIn')->name('home.view_notes');
Route::post('/home/view_notes/{id}',[NotesController::class,'updatenotes'])->middleware('isLoggedIn');



Route::get('/home/messages',[MessageController::class,'messages'])->middleware('isLoggedIn')->name('home.messages');
Route::get('/home/messages/{messageid}',[MessageController::class,'deletemessage'])->middleware('isLoggedIn');

Route::get('/home/room_management',[RoomExpensesController::class,'roomexpenses'])->middleware('isLoggedIn');
Route::get('/home/room_management/deposit_money',[RoomExpensesController::class,'roomdepositmoney'])->middleware('isLoggedIn');
Route::post('/home/room_management/deposit_money',[RoomExpensesController::class,'insertmoney'])->middleware('isLoggedIn');
Route::get('/home/room_management/withdraw_money',[RoomExpensesController::class,'withdrawmoney'])->middleware('isLoggedIn');
Route::post('/home/room_management/withdraw_money',[RoomExpensesController::class,'insertwithdrawmoney'])->middleware('isLoggedIn');

Route::get('/home/trn_finance_system',[TRNFinanceController::class,'trnfinance'])->middleware('isLoggedIn');
Route::get('/home/trn_finance_system/deposit_money',[TRNFinanceController::class,'trndepositmoney'])->middleware('isLoggedIn');
Route::post('/home/trn_finance_system/deposit_money',[TRNFinanceController::class,'trninsertmoney'])->middleware('isLoggedIn');
Route::get('/home/trn_finance_system/withdraw_money',[TRNFinanceController::class,'trnwithdrawmoney'])->middleware('isLoggedIn');
Route::post('/home/trn_finance_system/withdraw_money',[TRNFinanceController::class,'trninsertwithdrawmoney'])->middleware('isLoggedIn');


Route::get('/home/trn_projects',[TRNProjectController::class,'trnproject'])->middleware('isLoggedIn');
Route::post('/home/trn_projects',[TRNProjectController::class,'insertdata'])->middleware('isLoggedIn');
Route::get('/home/trn_projects/delete/{id}',[TRNProjectController::class,'deletedata'])->middleware('isLoggedIn');