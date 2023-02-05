<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('welcome');


Auth::routes();

Route::get('/home', [HomeController::class, 'employerdashboard'])->name('home');
// Route::get('/create', function () {
//     return view('seek');
// })->name('seek');

Route::post('/postjob', [JobPostController::class, 'create'])->name('postjob');

Route::post('/createaccount', [UserController::class, 'update'])->name('createaccount');

Route::any('/createjobpost', function () {
    return view('createjobpost');
})->name('createjobpost');

// Route::get('/employer', function () {
//     return view('employer');
// })->name('employer');

// Route::get('/seek', function () {
//     return view('seek');
// })->name('seek');

// Route::get('/employer', function () {
//     return view('employer');
// })->name('employer');
