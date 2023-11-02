<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', function () {
    return view('admin.dashboard');

});

// });



Route::resource('book', BookController::class);

Route::resource('user', UserController::class);
Route::resource('category', CategoryController::class);

Route::get('category.edit/{id}',[CategoryController::class, 'edit']);
Route::get('category.update',[CategoryController::class, 'update']);


Route::view('/login', 'identy.login')->name('login');


Route::view('/borrow', 'book.borrow');



// Route::get('/login', function () {
//     return view('identy.login');
// });


