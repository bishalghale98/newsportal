<?php

use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // company routes
    Route::resource('/admin/company', CompanyController::class)->names('company');

    // category routes
    Route::resource('/admin/category', CategoryController::class)->names('category');


    // advertise controller
    Route::resource('/admin/advertise', AdvertiseController::class)->names('advertise');


    // get post put delete all route will made by resource..
});

require __DIR__ . '/auth.php';
