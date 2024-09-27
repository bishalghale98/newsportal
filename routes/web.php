<?php

use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// Frontend Routes

Route::get('/', [PageController::class,'home'])->name('home');




// Backend routes

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // company routes
    Route::resource('/admin/company', CompanyController::class)->names('company');

    // category routes
    Route::resource('/admin/category', CategoryController::class)->names('category');


    // advertise controller
    Route::resource('/admin/advertise', AdvertiseController::class)->names('advertise');

    // Post Controller route
    Route::resource('/admin/post', PostController::class)->names('post');


    // get post put delete all route will made by resource..
});

require __DIR__ . '/auth.php';
