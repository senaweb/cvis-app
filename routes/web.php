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

Route::get('/', 'AppController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('/incidents', 'IncidentsController');

Route::get('/reports', 'DashboardReportsController@index')->name('dashboard.reports');
Route::get('/report/generate', 'DashboardReportsController@reportsGenerate')->name('dashboard.reports.generate');
Route::get('/report/generate/custom', 'DashboardReportsController@generateCustomDate')->name('dashboard.reports.generate-custom');

Route::get('/search', 'DashboardController@search')->name('search');
Route::resource('/users', 'UsersController')->except(['create', 'store']);

Auth::routes();
