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
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\sendmail;
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


Route::get('/mail',[sendmail::class,'index']);



Route::get('/login',[indexcontroller::class,'login']);
Route::post('/login',[AdminAuthController::class,'logincheck']);

Route::get('/registration',[admincontroller::class,'admin']);
Route::post('/registration',[admincontroller::class,'registrationcheck']);
Route::get('/admin/delete/{id}',[admincontroller:: class,'delete'])->name('admin.delete');

Route::get('/customerview',[admincontroller::class,'viewadmin']);


Route::get('/home/dashboard',[AdminAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/home/dashboard/logout',[AdminAuthController::class,'logout']);


Route::post('/home/dashboard/insertannouncement',[AnnouncementController::class,'insertdata'])->middleware('isLoggedIn');
Route::get('/home/dashboard/deleteannouncement/{id}',[AnnouncementController::class,'deletedata'])->middleware('isLoggedIn');


Route::get('/home/profile',[ProfileController::class,'profile'])->middleware('isLoggedIn');
Route::post('/home/profile/{id}',[ProfileController::class,'editprofile'])->middleware('isLoggedIn');


Route::post('/home/dashboard',[ChatController::class,'insertchat'])->middleware('isLoggedIn');





Route::get('/home/passwords',[indexcontroller::class,'password'])->middleware('isLoggedIn');
Route::post('/home/passwords',[PasswordController::class,'password'])->middleware('isLoggedIn');
Route::get('/home/passwords',[PasswordController::class,'viewpassword'])->middleware('isLoggedIn')->name('home.passwords');
Route::get('/home/passwords/{id}',[PasswordController::class,'deletepassword'])->middleware('isLoggedIn');


Route::get('/home/notes',[NotesController::class,'Notes'])->middleware('isLoggedIn')->name('home.notes');
Route::post('/home/notes',[NotesController::class,'storenotes'])->middleware('isLoggedIn')->name('home.notes');
Route::get('/home/notes/view_notes/',[NotesController::class,'ViewNotes'])->middleware('isLoggedIn')->name('home.notes.view_notes');
Route::post('/home/notes/view_notes/{id}',[NotesController::class,'updatenotes'])->middleware('isLoggedIn');
Route::get('/home/notes/view_notes/delete/{id}',[NotesController::class,'deletenotes'])->middleware('isLoggedIn');



Route::get('/home/messages',[MessageController::class,'messages'])->middleware('isLoggedIn')->name('home.messages');
Route::get('/home/messages/{messageid}',[MessageController::class,'deletemessage'])->middleware('isLoggedIn');

Route::get('/home/room_management',[RoomExpensesController::class,'roomexpenses'])->middleware('isLoggedIn');
Route::get('/home/room_management/deposit_money',[RoomExpensesController::class,'roomdepositmoney'])->middleware('isLoggedIn');
Route::get('/home/room_management/deposit_money/delete/{id}',[RoomExpensesController::class,'deletedepositmoney'])->middleware('isLoggedIn');
Route::post('/home/room_management/deposit_money',[RoomExpensesController::class,'insertmoney'])->middleware('isLoggedIn');
Route::get('/home/room_management/withdraw_money',[RoomExpensesController::class,'withdrawmoney'])->middleware('isLoggedIn');
Route::post('/home/room_management/withdraw_money',[RoomExpensesController::class,'insertwithdrawmoney'])->middleware('isLoggedIn');
Route::get('/home/room_management/withdraw_money/delete/{id}',[RoomExpensesController::class,'deletewithdrawmoney'])->middleware('isLoggedIn');
Route::get('/home/room_management/room_statements',[RoomExpensesController::class,'room_statements'])->middleware('isLoggedIn');

Route::get('/home/trn_finance_system',[TRNFinanceController::class,'trnfinance'])->middleware('isLoggedIn');
Route::get('/home/trn_finance_system/deposit_money',[TRNFinanceController::class,'trndepositmoney'])->middleware('isLoggedIn');
Route::post('/home/trn_finance_system/deposit_money',[TRNFinanceController::class,'trninsertmoney'])->middleware('isLoggedIn');
Route::get('/home/trn_finance_system/withdraw_money',[TRNFinanceController::class,'trnwithdrawmoney'])->middleware('isLoggedIn');
Route::post('/home/trn_finance_system/withdraw_money',[TRNFinanceController::class,'trninsertwithdrawmoney'])->middleware('isLoggedIn');


Route::get('/home/trn_projects',[TRNProjectController::class,'trnproject'])->middleware('isLoggedIn');
Route::post('/home/trn_projects',[TRNProjectController::class,'insertdata'])->middleware('isLoggedIn');
Route::get('/home/trn_projects/delete/{id}',[TRNProjectController::class,'deletedata'])->middleware('isLoggedIn');

Route::get('/home/room_reports',[RoomExpensesController::class,'room_report'])->middleware('isLoggedIn')->name('home.room_reports');