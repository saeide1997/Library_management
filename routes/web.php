<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



// });



Route::resource('book', BookController::class);

Route::resource('user', UserController::class);
Route::resource('category', CategoryController::class);

//Route::get('category.edit/{id}',[CategoryController::class, 'edit']);
Route::put('/update',[CategoryController::class, 'update'])->name('update');


Route::view('/login', 'identy.login')->name('login');


//Route::view('/borrow', 'book.borrow');

Route::get('/borrow',[BorrowController::class,'selectBox'])->name('borrow');
Route::get('/borrows',[BorrowController::class,'insert'])->name('insert');
Route::get('/borrowlist',[BorrowController::class,'index'])->name('borrowList');

Route::get('/d',[BorrowController::class,'d']);


// Route::get('/login', function () {
//     return view('identy.login');
// });


