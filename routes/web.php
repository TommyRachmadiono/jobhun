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
Route::get('/logout', 'LoginController@Logout')->name('logout');

Route::group(['middleware' => ['ceklogin']], function () {
    Route::get('/dashboard_admin', function () {
        return view('admin.index');
    })->name('home');
    //============================================= user =============================================//
    Route::get('user_show', 'UserController@index')->name('user_show');
    Route::get('user_add', function() {
        return view('admin.user_add');
    })->name('user_add');
    Route::delete('user_delete/{id}', 'UserController@destroy')->name('user.delete');
    Route::post('/add_user', 'UserController@store')->name('user.store');
    Route::post('/user_update/{id}', 'UserController@update')->name('user.update');
    //============================================= user =============================================//

    //============================================= tag =============================================//
    Route::get('tag_show', 'TagController@index')->name('tag_show');
    Route::get('tag_add', function() {
        return view('admin.tag_add');
    })->name('tag_add');
    Route::delete('tag_delete/{id}', 'TagController@destroy')->name('tag.delete');
    Route::post('/add_tag', 'TagController@store')->name('tag.store');
    Route::post('/tag_update/{id}', 'TagController@update')->name('tag.update');
    //============================================= tag =============================================//

    //============================================= post =============================================//
    Route::get('post_show', 'PostController@index')->name('post_show');
    Route::get('post_add', function() {
        return view('admin.post_add');
    })->name('post_add');
    //============================================= post =============================================//
});