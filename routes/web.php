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



Route::domain('{subdomain}.' . env('APP_DOMAIN'))->group(function () {
    Route::get('/', function ($subdomain) {
        return $subdomain;
    });
});

Route::get('/', function () {
    return view('welcome');
});
