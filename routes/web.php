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

Route::get('/', function () {
    return redirect()->route('user.dashboard');
})->middleware('auth');

Auth::routes();

Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function () {
    Route::get('/', 'DashboardController@home')->name('dashboard');
});

Route::group(['as' => 'ajk.', 'prefix' => 'ajk', 'namespace' => 'Ajk', 'middleware' => ['auth', 'ajk']], function () {
    Route::get('/', 'DashboardController@home')->name('dashboard');
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'DashboardController@home')->name('dashboard');
    Route::get('/feedback', 'DashboardController@feedback')->name('feedback');
    Route::get('/users', 'UsersController@index')->name('users');

    Route::prefix('masjid')->as('masjid.')->group(function () {
        Route::get('/', 'MasjidController@index')->name('list');
        Route::get('/application', 'MasjidController@index')->name('application');
        Route::get('/report', 'MasjidController@index')->name('report');
    });
});

Route::get('/home', 'HomeController@index')->name('home');

