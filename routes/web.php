<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin',function(){
    return view('admin');
})->name('admin')->middleware('admin');

Route::get('principal',function(){
    return view('principal');
})->name('principal')->middleware('principal');

Route::get('teacher',function(){
    return view('teacher');
})->name('teacher')->middleware('teacher');

Route::get('student',function(){
    return view('student');
})->name('student')->middleware('student');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

