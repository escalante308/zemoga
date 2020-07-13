<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController@index')->name('index');

Auth::routes(['register' => false]);

Route::get('/dashboard',    'DashboardController@index')->name('dashboard-index');
Route::post('/dashboard',   'DashboardController@store')->name('dashboard-store');
Route::post('/users/{id}',  'DashboardController@updateUser')->name('dashboard-update-user');
