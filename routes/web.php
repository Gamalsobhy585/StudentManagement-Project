<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;


Route::middleware('auth')->group(function(){

Route::get('/home', function () {
    return view('home.home');
});
Route::get('/students', 'App\Http\Controllers\StudentController@index');
Route::get('/students/create', 'App\Http\Controllers\StudentController@create');
Route::post('/students', 'App\Http\Controllers\StudentController@store');
Route::get('/student/{id}', 'App\Http\Controllers\StudentController@show');
Route::get('/student/{id}/edit', 'App\Http\Controllers\StudentController@edit');
Route::put('/student/{id}', 'App\Http\Controllers\StudentController@update');
Route::delete('/student/{id}', 'App\Http\Controllers\StudentController@destroy');




Route::get('/teachers', 'App\Http\Controllers\TeacherController@index');
Route::get('/teachers/create', 'App\Http\Controllers\TeacherController@create');
Route::post('/teachers', 'App\Http\Controllers\TeacherController@store');
Route::get('/teacher/{id}', 'App\Http\Controllers\TeacherController@show');
Route::get('/teacher/{id}/edit', 'App\Http\Controllers\TeacherController@edit');
Route::put('/teacher/{id}', 'App\Http\Controllers\TeacherController@update');
Route::delete('/teacher/{id}', 'App\Http\Controllers\TeacherController@destroy');




Route::resource('courses', CourseController::class);


Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', 'App\Http\Controllers\CourseController@create');
Route::post('/courses', 'App\Http\Controllers\CourseController@store');
Route::get('/course/{id}', 'App\Http\Controllers\CourseController@show');
Route::get('/course/{id}/edit', 'App\Http\Controllers\CourseController@edit');
Route::put('/course/{id}', 'App\Http\Controllers\CourseController@update');
Route::delete('/course/{id}', 'App\Http\Controllers\CourseController@destroy');




Route::get('/batches', 'App\Http\Controllers\BatchController@index')->name('batches.index');
Route::get('/batches/create', 'App\Http\Controllers\BatchController@create');
Route::post('/batches', 'App\Http\Controllers\BatchController@store');
Route::get('/batch/{id}', 'App\Http\Controllers\BatchController@show');
Route::get('/batch/{id}/edit', 'App\Http\Controllers\BatchController@edit');
Route::put('/batch/{id}', 'App\Http\Controllers\BatchController@update');
Route::delete('/batch/{id}', 'App\Http\Controllers\BatchController@destroy');



Route::get('/enrollments', 'App\Http\Controllers\EnrollmentController@index')->name('enrollments.index');
Route::get('/enrollments/create', 'App\Http\Controllers\EnrollmentController@create');
Route::post('/enrollments', 'App\Http\Controllers\EnrollmentController@store');
Route::get('/enrollment/{id}', 'App\Http\Controllers\EnrollmentController@show');
Route::get('/enrollment/{id}/edit', 'App\Http\Controllers\EnrollmentController@edit');
Route::put('/enrollment/{id}', 'App\Http\Controllers\EnrollmentController@update');
Route::delete('/enrollment/{id}', 'App\Http\Controllers\EnrollmentController@destroy');



Route::get('/payments', 'App\Http\Controllers\PaymentController@index')->name('payments.index');
Route::get('/payments/create', 'App\Http\Controllers\PaymentController@create');
Route::post('/payments', 'App\Http\Controllers\PaymentController@store');
Route::get('/payment/{id}', 'App\Http\Controllers\PaymentController@show')->name('payments.show');
Route::get('/payment/{id}/edit', 'App\Http\Controllers\PaymentController@edit');
Route::put('/payment/{id}', 'App\Http\Controllers\PaymentController@update');
Route::delete('/payment/{id}', 'App\Http\Controllers\PaymentController@destroy');



Route::get('report/report1/{pid}', [ReportController::class, 'generateReport']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});
Route::middleware('guest')->group(function(){

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});
