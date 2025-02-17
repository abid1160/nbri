<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

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

 


Route::get('/',[ApplicationController::class,'index'])->name('practise');
Route::post('/store',[ApplicationController::class,'store'])->name('store');
Route::get('/member/list',[ApplicationController::class,'view'])->name('member.view');
Route::get('/member/detail',[ApplicationController::class,'detail'])->name('member.detail');

