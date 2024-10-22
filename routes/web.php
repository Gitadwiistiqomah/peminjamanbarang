<?php

use App\Http\Controllers\FormPeminjamanController;
use App\Http\Controllers\FormPeminjamansController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [FormPeminjamansController::class, 'index'])->name('form.index');
Route::post('/', [FormPeminjamansController::class, 'store'])->name('form.store');


Auth::routes([
    'register' => false,
       'reset' => false,
       'verify' => false
   ]);
   
   Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   
   Route::group([
       'middleware' => ['auth'],
       'prefix' => 'admin', //admin/pemilik
       'as' => 'admin.' 
   ], function() {
   Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
   Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::get ('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.index') ;
Route::get ('/categories/create', [App\Http\Controllers\CategoriesController::class, 'create'])->name('categories.create') ;
Route::post ('/categories', [App\Http\Controllers\CategoriesController::class, 'store'])->name('categories.store') ;
Route::get ('/categories/edit{id}', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('categories.edit') ;
Route::put ('/categories/{id}', [App\Http\Controllers\CategoriesController::class, 'update'])->name('categories.update') ;
Route::delete ('/categories/{id}', [App\Http\Controllers\CategoriesController::class, 'destroy'])->name('categories.destroy') ;
Route::get ('/categories/{id}', [App\Http\Controllers\CategoriesController::class, 'show'])->name('categories.show') ;


Route::get ('/items', [App\Http\Controllers\ItemsController::class, 'index'])->name('items.index') ;
Route::get ('/items/create', [App\Http\Controllers\ItemsController::class, 'create'])->name('items.create') ;
Route::post ('/items', [App\Http\Controllers\ItemsController::class, 'store'])->name('items.store') ;
Route::get ('/items/edit{id}', [App\Http\Controllers\ItemsController::class, 'edit'])->name('items.edit') ;
Route::put ('/items/{id}', [App\Http\Controllers\ItemsController::class, 'update'])->name('items.update') ;
Route::delete ('/items/{id}', [App\Http\Controllers\ItemsController::class, 'destroy'])->name('items.destroy') ;
Route::get ('/items/{id}', [App\Http\Controllers\ItemsController::class, 'show'])->name('items.show') ;

// Route::resource('/peminjamans', App\Http\Controllers\PeminjamansController::class)->only(['index', 'show', 'destroy']);

Route::get ('/peminjamans', [App\Http\Controllers\PeminjamansController::class, 'index'])->name('peminjamans.index') ;
Route::delete ('/peminjamans/{id}', [App\Http\Controllers\PeminjamansController::class, 'destroy'])->name('peminjamans.destroy') ;
Route::get ('/peminjamans/{id}', [App\Http\Controllers\PeminjamansController::class, 'show'])->name('peminjamans.show') ;
});

