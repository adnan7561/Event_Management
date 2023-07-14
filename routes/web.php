<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::prefix('events')->group(function () {
    Route::get('', [EventController::class, 'index'])->name('events.index');
    Route::get('create', [EventController::class, 'create'])->name('events.create');
    Route::post('store', [EventController::class, 'store'])->name('events.store');
    Route::get('{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::get('{event}/show', [EventController::class, 'show'])->name('events.show');
    Route::put('{event}/update', [EventController::class, 'update'])->name('events.update');
    Route::delete('{event}/destroy', [EventController::class, 'destroy'])->name('events.destroy');
});
