<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;



Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {


    Route::get('login', [AdminController::class,'create'])->name('admin.login');
    Route::post('login', [AdminController::class,'store'])->name('admin.login.request');

    Route::middleware(['admin'])->group(function () {
        Route::resource('dashboard', AdminController::class)->only(['index']);
        Route::get('logout', [AdminController::class,'destroy'])->name('admin.logout');
});
   
   
});
