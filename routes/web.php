<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//guest
Route::group(['middleware' => 'guest'], function () {
    Route::get('/teacher-login', function () {
        return view('teachers.auth.login');
    })->name('teacher-login');

    Route::get('/teacher-register', function () {
        return view('teachers.auth.register');
    })->name('teacher-register');

});

//logged in
Route::group(['middleware' => 'auth'], function () {

    Route::get('/student/{id}',
        [App\Http\Controllers\StudentController::class, 'index']
    )->name('student');

    Route::get('/student/{id}/grade/{semester}/add',
        [App\Http\Controllers\StudentController::class, 'addGrade']
    )->name('student.grade.add');

    Route::post('/student/grade/save',
        [App\Http\Controllers\StudentController::class, 'storeGrade']
    )->name('student.grade.store');

    Route::get('/student/{id}/grade/{semester}/edit',
        [App\Http\Controllers\StudentController::class, 'editGrade']
    )->name('student.grade.edit');

    Route::get('/student/{id}/grade/{semester}/delete',
        [App\Http\Controllers\StudentController::class, 'deleteGrade']
    )->name('student.grade.delete');
});

