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

Route::get('/', 'HomeController@index')->name('home');

/** Contacts **/
Route::get('contacts', 'HomeController@getContacts')->name('contacts');
Route::post('contacts', 'HomeController@sendMail')->name('contact.mail');

/** Route for static page **/
Route::get('{category}/{slug}', 'HomeController@getExtra')->name('extra');
/** Route for static page end **/

/** Contacts **/
Route::get('alumni', 'HomeController@getAlumni')->name('alumni');


/**
 * Authenticate ROUTE
 */
Route::group(['namespace' => 'Auth'], function(){
    Route::get('vs-niketan-login', ['as' => 'login', 'uses' => 'LoginController@login']);
    Route::post('vs-niketan-login', ['as' => 'auth.login', 'uses' => 'LoginController@authenticate']);
    Route::post('logout', ['as' => 'auth.logout', 'uses' => 'LoginController@logout']);
});

