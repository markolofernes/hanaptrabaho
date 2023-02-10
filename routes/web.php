<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\JobPostController;

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
Route::get('/home', [HomeController::class, 'seekerdashboard'])->name('home');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

// Route::get('/create', function () {
//     return view('seek');
// })->name('seek');

Route::post('/postjob', [JobPostController::class, 'create'])->name('postjob');

Route::post('/postresume', [ResumeController::class, 'create'])->name('postresume');

Route::post('/createaccount', [UserController::class, 'update'])->name('createaccount');

Route::get('/deletejob/{id}', [JobPostController::class, 'delete'])->name('deletejob');

Route::get('/actions.editresume/{id}', [ResumeController::class, 'edit'])->name('actions.editresume');

Route::post('/actions.updateresume/{id}', [ResumeController::class, 'update'])->name('actions.updateresume');

Route::get('/actions.deleteresume/{id}', [ResumeController::class, 'delete'])->name('actions.deleteresume');

Route::any('/createresume', function () {
    return view('createresume');
})->name('createresume');

Route::any('/createjobpost', function () {
    return view('createjobpost');
})->name('createjobpost');

// Route::any('/jobposts/{id}', [HomeController::class, 'viewjobpost'])->name('jobposts');
Route::get('/jobposts/{id}', function ($id) {
    $jobpost = App\Models\JobPost::find($id);
    if ($jobpost !== null) {
        return view('jobposts')->with('jobposts', [$jobpost]);
    } else {
        return view('home');
    }
})->name('/');

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
    return "all cleared ...";

});
// Route::get('/employer', function () {
//     return view('employer');
// })->name('employer');

// Route::get('/seek', function () {
//     return view('seek');
// })->name('seek');

// Route::get('/employer', function () {
//     return view('employer');
// })->name('employer');
