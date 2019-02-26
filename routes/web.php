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
    return view('welcome');
});

//mailer

Route::get('/email/{id}/send','MailController@email')->name('sentEmail');



Route::group(['prefix' => 'admin'], function () {
  Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'operation'], function () {
  Route::get('/login', 'OperationAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'OperationAuth\LoginController@login');
  Route::post('/logout', 'OperationAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'OperationAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'OperationAuth\RegisterController@register');

  Route::post('/password/email', 'OperationAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'OperationAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'OperationAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'OperationAuth\ResetPasswordController@showResetForm');
});

  Route::group(['prefix' => 'account'], function () {
  Route::get('/login', 'AccountAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AccountAuth\LoginController@login');
  Route::post('/logout', 'AccountAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AccountAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AccountAuth\RegisterController@register');

  Route::post('/password/email', 'AccountAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AccountAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AccountAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AccountAuth\ResetPasswordController@showResetForm');
});

  Route::group(['prefix' => 'staff'], function () {
  Route::get('/login', 'StaffAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StaffAuth\LoginController@login');
  Route::post('/logout', 'StaffAuth\LoginController@logout')->name('logout');

//  Route::get('/register', 'StaffAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StaffAuth\RegisterController@register');

  Route::post('/password/email', 'StaffAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StaffAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StaffAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StaffAuth\ResetPasswordController@showResetForm');
});


Route::get('/home', 'HomeController@index')->name('home');
