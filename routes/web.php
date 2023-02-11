<?php

use Barryvdh\DomPDF\Facade\Pdf;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/home', [HomeController::class, 'employerdashboard'])->name('home');

Route::get('/home', [HomeController::class, 'seekerdashboard'])->name('home');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::post('/createaccount', [UserController::class, 'update'])->name('createaccount');

Route::get('/editprofile/{id}', [UserController::class, 'edit'])->name('editprofile');

// jobpost
Route::post('/postjob', [JobPostController::class, 'create'])->name('postjob');

Route::post('/action.updatejob{id}', [JobPostController::class, 'update'])->name('action.updatejob');

Route::get('/editjobentry{id}', [JobPostController::class, 'edit'])->name('editjobentry');

Route::post('/actions.updatejobentry/{id}', [JobPostController::class, 'update'])->name('actions.updatejobentry');

Route::get('/deletejob/{id}', [JobPostController::class, 'delete'])->name('deletejob');

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


Route::post('/postresume', [ResumeController::class, 'create'])->name('postresume');

Route::get('/actions.editresume/{id}', [ResumeController::class, 'edit'])->name('actions.editresume');

Route::post('/actions.updateresume/{id}', [ResumeController::class, 'update'])->name('actions.updateresume');

Route::get('/actions.deleteresume/{id}', [ResumeController::class, 'delete'])->name('actions.deleteresume');

Route::any('/createresume', function () {
    return view('createresume');
})->name('createresume');

// pdf creator - userlists
Route::get('/generate-users-report-pdf', function () {
    $users = App\Models\User::all();
    $data = [
        'users' => $users,
    ];
    $pdf = Pdf::loadView('pdf.userlist', $data);
    return $pdf->stream('userlist.pdf');
})->name('generate-users-report-pdf');

// pdf creator - resume
Route::get('/generate-resume-pdf/{id}', function () {
    $Resume = App\Models\Resume::all();
    $data = [
        'Resume' => $Resume,
    ];
    $pdf = Pdf::loadView('pdf.resume', $data);
    return $pdf->stream('resume.pdf');
})->name('generate-resume-pdf');

Route::get('/generate-resume-download-pdf/{id}', function () {
    $Resume = App\Models\Resume::all();
    $data = [
        'Resume' => $Resume,
    ];
    $pdf = Pdf::loadView('pdf.resume', $data);
    return $pdf->download('resume.pdf');
})->name('generate-resume-download-pdf');


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
    return "all cleared ...";

});