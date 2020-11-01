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
    return view('/home/welcome');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('forum/',[App\Http\Controllers\ForumController::class, 'index'])->name('forum.show')->middleware('auth');
Route::delete('forum/{publication}', [App\Http\Controllers\PublicationController::class, 'destroy'])->where('publication','[0-9]+')->name('publication.destroy');
Route::get('forum/{publication}/editar', [App\Http\Controllers\PublicationController::class, 'edit'])->where('publication','[0-9]+')->name('publication.edit')->middleware('auth');
Route::patch('forum/{publication}', [App\Http\Controllers\PublicationController::class, 'update'])->where('publication','[0-9]+')->name('publication.update');

Route::get('forum/addPublication',[App\Http\Controllers\PublicationController::class, 'index'])->name('publication.add')->middleware('auth');
Route::post('forum/addPublication',[App\Http\Controllers\PublicationController::class, 'store'])->name('publication.store');
