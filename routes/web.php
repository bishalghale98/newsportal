<?php

use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



// Frontend Routes

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/category/{slug}', [PageController::class, 'category'])->name('cat');
Route::get('/news/{id}', [PageController::class, 'news'])->name('news');

// Route for AJAX request to increment views
Route::post('/increment-view', [PageController::class, 'incrementView']);

Route::get('/search', [PageController::class, 'search'])->name('search');



// Backend routes

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // company routes

    // category routes
    Route::resource('/admin/category', CategoryController::class)->names('category');




    Route::middleware('admin')->prefix('admin')->group(function () {
        // advertise controller
        Route::resource('/advertise', AdvertiseController::class)->names('advertise');

        // Post Controller route
        Route::resource('/post', PostController::class)->names('post');


        Route::resource('/user', UserController::class)->names('user');

        Route::resource('/company', CompanyController::class)->names('company');
    });



    // get post put delete all route will made by resource..
});

require __DIR__ . '/auth.php';
