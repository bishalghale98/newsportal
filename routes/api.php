<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('company', [CompanyController::class, 'company']);
Route::post('company-store', [CompanyController::class, 'company_store']);




Route::get('categories', [PostController::class, 'categories']);
Route::get('latest-post', [PostController::class, 'latest_post']);
Route::get('trending-post', [PostController::class, 'trending_post']);
Route::get('category/{slug}', [PostController::class, 'category']);
Route::get('post/{id}', [PostController::class, 'post']);
