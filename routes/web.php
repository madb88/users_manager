<?php

use Illuminate\Support\Facades\Redirect;

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


Route::get('/', 'DashboardController@index');

Route::post('lang_select', ['as' => 'lang_select', function(){

    if(!empty(request()->input('language'))){
        Session::put('new_lang', request()->input('language'));
    };

    return Redirect::back();
}]);

Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
