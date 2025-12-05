<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Student\ExamController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

// admin
Route::middleware('admin')->group(function () {

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::get('admin/login', [LoginController::class, 'login_view'])->name('login.view');
Route::post('login', [LoginController::class, 'loggedin'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// admin


// student
Route::get('student/register', [LoginController::class, 'register_view'])->name('register');
Route::post('student/register/submit', [LoginController::class, 'register'])->name('register.submit');
Route::get('student/login',[LoginController::class,'student_login_view'])->name('student.login');

Route::middleware('student')->group(function () {  
    Route::get('start-test', [ExamController::class, 'start_test'])->name('start.test');
    Route::get('career-test',[ExamController::class,'career_test'])->name('career.test');
    Route::post('career-test/submit',[ExamController::class,'career_test_submit'])->name('career.test.submit');
});

Route::get('cat-eaxm', function () {
    return view('student.cat-exam');
});
// student   

// Route::get('/test-mail', function () {
//     Mail::raw('SMTP working!', function ($message) {
//         $message->to('arnabrofficial@gmail.com')->subject('Test SMTP');
//     });
//     return 'Email sent';
// });

// Route::get('cat-eaxm', function () {
//     return view('student.cat-exam');
// });
// student   

