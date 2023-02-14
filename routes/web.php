<?php

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\JobSaveController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobApplicantController;

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


Route::get('/actions.editprofile/{id}', [UserController::class, 'edit'])->name('actions.editprofile');

Route::get('/actions.delesave/{id}', [JobSaveController::class, 'delete'])->name('actions.delesave');

Route::get('/showsavejobs/{id}', [JobSaveController::class, 'index'])->name('showsavejobs');

Route::post('/savejob/{id}', [JobSaveController::class, 'create'])->name('savejob');

Route::post('/applyjob/{id}', [JobApplicantController::class, 'create'])->name('applyjob');

Route::get('/appliedjobs/{id}', [JobApplicantController::class, 'index'])->name('appliedjobs');


// jobpost
Route::post('/postjob', [JobPostController::class, 'create'])->name('postjob');

Route::post('/actions.updatejob{id}', [JobPostController::class, 'update'])->name('actions.updatejob');

Route::get('/actions.editjobentry{id}', [JobPostController::class, 'edit'])->name('actions.editjobentry');

Route::post('/actions.updatejobentry/{id}', [JobPostController::class, 'update'])->name('actions.updatejobentry');

Route::get('/deletejob/{id}', [JobPostController::class, 'delete'])->name('deletejob');

// Route::post('//{id}', [InterviewController::class, 'create'])->name('createinterviewappointment');

Route::post('/createinterview', [InterviewController::class, 'create'])->name('createinterview');

Route::any('/createinterviewappointment', function () {
    return view('createinterviewappointment');
})->name('createinterviewappointment');

Route::any('/actions.createjobpost', function () {
    return view('actions.createjobpost');
})->name('actions.createjobpost');

Route::get('/jobposts/{id}', [HomeController::class, 'myjobpost'])->name('/');

Route::get('/viewjob/{id}', [HomeController::class, 'viewjob'])->name('viewjob');


Route::post('/actions.postresume', [ResumeController::class, 'create'])->name('actions.postresume');

Route::get('/actions.editresume/{id}', [ResumeController::class, 'edit'])->name('actions.editresume');

Route::post('/actions.updateresume/{id}', [ResumeController::class, 'update'])->name('actions.updateresume');

Route::get('/actions.deleteresume/{id}', [ResumeController::class, 'delete'])->name('actions.deleteresume');

Route::any('/actions.createresume', function () {
    return view('actions.createresume');
})->name('actions.createresume');

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


Route::get('/view-resume-pdf/{id}', function ($id) {
    $Resume = App\Models\Resume::all();
    $data = [
        'Resume' => $Resume,
        'user_id' => $id,
    ];
    $pdf = Pdf::loadView('pdf.viewresume', $data);
    return $pdf->stream('resume.pdf');
})->name('view-resume-pdf');


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
    return 'Cleared! <br><a href="/"> back </a>';

});

Route::get('sendemail', [MailController::class, 'sendmail'])->name('sendemail');

Route::get('/jobs.search', [HomeController::class, 'search'])->name('jobs.search');