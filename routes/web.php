<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkSpaceController;
use App\Http\Controllers\WorkSpaceUserController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\QuestionController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('usertypes', UserTypeController::class);
Route::resource('users', UserController::class);
Route::resource('workspaces', WorkSpaceController::class);
Route::resource('workspaceuser', WorkSpaceUserController::class);
Route::resource('forms', FormController::class);
Route::get('/formquestions/{form}', [App\Http\Controllers\FormController::class, 'questions'])->name('question');
Route::post('/questionstore', [App\Http\Controllers\FormController::class, 'questionstore'])->name('questionstore');
Route::get('/formreponse/{form}', [App\Http\Controllers\FormController::class, 'response'])->name('resp');
Route::post('/respstore', [App\Http\Controllers\FormController::class, 'respstore'])->name('respstore');
Route::get('/export/{form}', [App\Http\Controllers\FormController::class, 'export'])->name('export');
Route::get('/viewexport', [App\Http\Controllers\FormController::class, 'viewexport'])->name('viewexport');

Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
Route::get('/pqrs', function () { return view('layouts.pqrs'); })->name('pqrs');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
