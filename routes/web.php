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

Route::get('/', function () {
    return view('templates.masteradmin');
});



Route::get('/login', function () {
    return view('login');
})->name('welcome');

Route::post('/login', 'LoginController@CekLogin')->name('loginCek');


Route::group(['middleware' => ['ceklogin']], function () {
    Route::get('/dashboard_admin', function () {
        return view('admin.index');
    })->name('home');
    Route::get('/logout', 'LoginController@Logout')->name('logout');
});