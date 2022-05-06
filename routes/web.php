<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;

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
    return view('welcome');
});


Route::prefix('admin/')->name('admin.')->group(function () {

    Route::get('loginpage', [LoginController::class, 'loginView'])->name('loginpage');
    Route::get('registerview', [LoginController::class, 'registerView'])->name('registerview');
    Route::post('registeruser', [LoginController::class, 'register'])->name('registeruser');
    Route::post('loginuser', [LoginController::class, 'customLogin'])->name('loginuser');
});


Route::prefix('social/')->name('social.')->group(function () {

    Route::get('{driver}', [LoginController::class, 'redirectToProvider'])->name('link');
});


Route::prefix('admin/')->name('user.')->middleware('auth')->group(function () {

    Route::get('userview', [LoginController::class, 'userView'])->name('userview');
    Route::get('addstudent', [StudentController::class, 'addStudentView'])->name('addstudent');
    Route::post('storestudent', [StudentController::class, 'storeStudent'])->name('storestudent');
    Route::get('liststudent', [StudentController::class, 'listStudent'])->name('liststudent');
    Route::get('addmark', [StudentController::class, 'addMarkView'])->name('addmark');
    Route::post('storemark', [StudentController::class, 'storeStudentMark'])->name('storemark');
    Route::get('liststudentmark', [StudentController::class, 'listStudentMarks'])->name('liststudentmark');
});



Route::any('{driver}/callback', [LoginController::class, 'handleProviderCallback']);
