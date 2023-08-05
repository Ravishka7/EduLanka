<?php

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
