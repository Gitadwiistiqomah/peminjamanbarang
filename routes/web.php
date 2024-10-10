<?php

use App\Http\Controllers\FormPeminjamanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [FormPeminjamanController::class, 'index'])->name('form.index');
Route::post('/', [FormPeminjamanController::class, 'store'])->name('form.store');

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


   Route::get ('/members', [App\Http\Controllers\MembersController::class, 'index'])->name('members.index') ;
Route::get ('/members/create', [App\Http\Controllers\MembersController::class, 'create'])->name('members.create') ;
Route::post ('/members', [App\Http\Controllers\MembersController::class, 'store'])->name('members.store') ;
Route::get ('/members/edit{id}', [App\Http\Controllers\MembersController::class, 'edit'])->name('members.edit') ;
Route::put ('/members/{id}', [App\Http\Controllers\MembersController::class, 'update'])->name('members.update') ;
Route::delete ('/members/{id}', [App\Http\Controllers\MembersController::class, 'destroy'])->name('members.destroy') ;
Route::get ('/members/{id}', [App\Http\Controllers\MembersController::class, 'show'])->name('members.show') ;


Route::get ('/items', [App\Http\Controllers\ItemsController::class, 'index'])->name('items.index') ;
Route::get ('/items/create', [App\Http\Controllers\ItemsController::class, 'create'])->name('items.create') ;
Route::post ('/items', [App\Http\Controllers\ItemsController::class, 'store'])->name('items.store') ;
Route::get ('/items/edit{id}', [App\Http\Controllers\ItemsController::class, 'edit'])->name('items.edit') ;
Route::put ('/items/{id}', [App\Http\Controllers\ItemsController::class, 'update'])->name('items.update') ;
Route::delete ('/items/{id}', [App\Http\Controllers\ItemsController::class, 'destroy'])->name('items.destroy') ;
Route::get ('/items/{id}', [App\Http\Controllers\ItemsController::class, 'show'])->name('items.show') ;

Route::resource('/peminjaman', App\Http\Controllers\PeminjamanController::class)->only(['index', 'show', 'destroy']);

});

