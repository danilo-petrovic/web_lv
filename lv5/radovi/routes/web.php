<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::get('/lang/{lang}', function ($lang) {
    if (!in_array($lang, ['hr', 'en'])) {
        abort(404);
    }

    session(['locale' => $lang]);
    app()->setLocale($lang);

    return back();
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index']);
    Route::post('/admin/users/{user}', [AdminController::class, 'update']);
});

Route::middleware(['auth','nastavnik'])->group(function () {
    Route::get('/nastavnik/radovi', [TaskController::class, 'index']);
    Route::get('/nastavnik/radovi/create', [TaskController::class, 'create']);
    Route::post('/nastavnik/radovi', [TaskController::class, 'store']);

    Route::get('/nastavnik/prijave', [ApplicationController::class, 'index']);
    Route::post('/nastavnik/prihvati/{application}', [ApplicationController::class, 'accept']);
    Route::post('/nastavnik/odbij/{application}', [ApplicationController::class, 'reject']);
});

Route::middleware(['auth','student'])->group(function () {
    Route::get('/student/radovi', [StudentController::class, 'index']);
    Route::post('/student/apply/{task}', [StudentController::class, 'apply']);
});

require __DIR__.'/auth.php';
