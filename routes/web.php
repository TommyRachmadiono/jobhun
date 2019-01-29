<?php
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
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
    return view('user.index');
})->name('user_home');

Route::get('blog/all/{tag?}', 'BlogController@index')->name('all_blog');

Route::get('blog/{url}', 'BlogController@detailBlog')->name('detail_blog');
Route::get('/about-us', function () {
    return view('user.about_us');
})->name('about_us');

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@CekLogin')->name('loginCek');
Route::get('/logout', 'LoginController@Logout')->name('logout');
Route::post('register', 'LoginController@register')->name('register');
Route::get('register/{tkn}', 'LoginController@registerCek')->name('register.cek');
Route::get('destroy_session/{ses}', 'LoginController@destroySession')->name('destroy_session');
Route::get('refresh_captcha', 'LoginController@refreshCaptcha')->name('refresh.captcha');
Route::post('forgot_password', 'LoginController@lupaPassword')->name('forgot_password');
// Route::get('password/forgot/{tkn}', 'LoginController@lupaPasswordCek')->name('forgot_pass.cek');
Route::get('password/forgot/{tkn}', 'LoginController@kirimPasswordBaru')->name('send_password');

Route::post('subscribe', 'SubscriptionController@subscribe')->name('subscribe');

Route::get('/download', function() {
    return Excel::download(new UsersExport, 'users.xls');
});

Route::get('test', function() {
    return view('test');
});
Route::get('profile', function() {
    return view('admin.user_profile');
});


Route::group(['middleware' => ['ceklogin']], function () {
    Route::get('/dashboard_admin', 'UserController@countUser')->name('home');
    //============================================= user =============================================//
    Route::get('user/show', 'UserController@index')->name('user_show');
    Route::get('user/add', function() {
        return view('admin.user_add');
    })->name('user_add');
    Route::delete('user_delete/{id}', 'UserController@destroy')->name('user.delete');
    Route::post('/add_user', 'UserController@store')->name('user.store');
    Route::post('/user_update/{id}', 'UserController@update')->name('user.update');
    Route::get('user/profile/{id}', 'UserController@getProfile')->name('user_profile');
    Route::patch('/profile_update/{id}', 'UserController@updateProfile')->name('profile.update');
    Route::patch('/photo_update/{id}', 'UserController@changePhoto')->name('photo.update');
    Route::patch('/password_update/{id}', 'UserController@changePassword')->name('password.update');
    //============================================= user =============================================//

    //============================================= tag =============================================//
    Route::get('tag/show', 'TagController@index')->name('tag_show');
    Route::get('tag/add', function() {
        return view('admin.tag_add');
    })->name('tag_add');
    Route::delete('tag_delete/{id}', 'TagController@destroy')->name('tag.delete');
    Route::post('/add_tag', 'TagController@store')->name('tag.store');
    Route::post('/tag_update/{id}', 'TagController@update')->name('tag.update');
    //============================================= tag =============================================//

    //============================================= post =============================================//
    Route::get('post/show', 'PostController@index')->name('post_show');
    Route::get('post/add', 'PostController@create')->name('post_add');
    Route::get('post_edit/{id}', 'PostController@edit')->name('post_edit');
    Route::post('/add_post', 'PostController@store')->name('post.store');
    Route::patch('edit_post/{id}', 'PostController@update')->name('post.edit');
    //============================================= post =============================================//
});

Route::get('user/jsondata', 'UserController@jsondata');
Route::post('user/ajaxadd', 'UserController@ajaxstore');