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

// Subdomains
Route::domain('{subdomain}.' . env('MULTITENANCY_BASE_URL'))->group(function () {
    Route::group(['middleware' => ['tenant.auth']], function () {
        Route::get('/admin', function ($subdomain) {
            return "auth" . $subdomain;
        });
    });

    Route::group(['middleware' => ['tenant.guest']], function () {
        Route::get('/', function ($subdomain) {
            return $subdomain;
        });
    });
});

// Main domain
Route::get('/', function () {
    return view('welcome');
});
