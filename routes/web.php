<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Movies;
use App\Http\Controllers\Genre;
use App\Http\Controllers\Actors;

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

/*
|--------------------------------------------------------------------------
| INDEX
|--------------------------------------------------------------------------
*/
Route::prefix('')->name('home.')->group(function(){
    Route::get('',[Home\IndexController::class, 'index'])->name('index');
    Route::get('indexAjax',[Home\IndexController::class, 'indexAJAX'])->name('indexAjax');
});


/*
|--------------------------------------------------------------------------
| MOVIES
|--------------------------------------------------------------------------
*/

Route::prefix('movies')->name('movies.')->group(function(){
    Route::get('',[Movies\IndexController::class, 'index'])->name('index');
    Route::get('indexServerSite',[Movies\IndexController::class, 'indexServerSite'])->name('indexServerSite');
    Route::get('indexJoin',[Movies\IndexController::class, 'indexJoin'])->name('indexJoin');
    Route::get('create',[Movies\CreateController::class, 'create'])->name('create');
    Route::post('store',[Movies\StoreController::class, 'store'])->name('store');
    Route::get('{id}/edit',[Movies\EditController::class, 'edit'])->name('edit');
    Route::put('update/{id}',[Movies\UpdateController::class, 'update'])->name('update');
    Route::get('show/{id}',[Movies\ShowController::class, 'show'])->name('show');
    Route::delete('destroy/{id}',[Movies\DestroyController::class, 'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| ACTORS
|--------------------------------------------------------------------------
*/
Route::prefix('actors')->name('actors.')->group(function(){
    Route::get('',[Actors\IndexController::class, 'index'])->name('index');
    Route::get('indexServerSite',[Actors\IndexController::class, 'indexServerSite'])->name('indexServerSite');
    Route::get('create',[Actors\CreateController::class, 'create'])->name('create');
    Route::post('store',[Actors\StoreController::class, 'store'])->name('store');
    Route::get('{id}/edit',[Actors\EditController::class, 'edit'])->name('edit');
    Route::put('update/{id}',[Actors\UpdateController::class, 'update'])->name('update');
    Route::get('show/{id}',[Actors\ShowController::class, 'show'])->name('show');
    Route::delete('destroy/{id}',[Actors\DestroyController::class, 'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| GENRES
|--------------------------------------------------------------------------
*/
Route::prefix('genres')->name('genres.')->group(function(){
    Route::get('',[Genre\IndexController::class, 'index'])->name('index');
    Route::get('indexServerSite',[Genre\IndexController::class, 'indexServerSite'])->name('indexServerSite');
    Route::get('create',[Genre\CreateController::class, 'create'])->name('create');
    Route::post('store',[Genre\StoreController::class, 'store'])->name('store');
    Route::get('{id}/edit',[Genre\EditController::class, 'edit'])->name('edit');
    Route::put('update/{id}',[Genre\UpdateController::class, 'update'])->name('update');
    Route::get('show/{id}',[Genre\ShowController::class, 'show'])->name('show');
    Route::delete('destroy/{id}',[Genre\DestroyController::class, 'destroy'])->name('destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
