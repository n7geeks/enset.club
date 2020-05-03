<?php

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

// Auth
Route::domain('{subdomain}.' . env('MULTITENANCY_BASE_URL'))
    ->middleware(['handle.subdomain'])
    ->group(function () {
        Route::prefix('admin')->group(function () {
            Auth::routes(['register' => false]);
        });
    });

// Subdomains
Route::domain('{subdomain}.' . env('MULTITENANCY_BASE_URL'))
    ->as('dm.')
    ->middleware(['handle.subdomain'])
    ->group(function () {
        Route::prefix('admin')->as('admin.')->middleware(['tenant.auth'])->group(function () {
            Route::get('/', function ($subdomain) {
                return view('dashboard.homepage');
            })->name('home');

            Route::resource('clubs', ClubController::class);
            Route::resource('posts', PostsController::class);
        });

        Route::as('guest.')->middleware(['tenant.guest'])->group(function () {
            Route::get('/', function ($subdomain) {
                return $subdomain;
            })->name('home');
        });
    });

// Main domain
Route::as('guest.')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});
