<?php

Route::namespace('Modules\Alumni\Http\Controllers')->middleware('access:admin.alumni')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('alumni', 'AlumniController');
	Route::put('alumni/change/status', ['as'=>'change.status', 'uses'=>'AlumniController@changeStatus']);
});

/** Frontend Routes */
Route::group(['namespace' => 'Modules\Alumni\Http\Controllers\Frontend'], function() {
    /** Alumni Routes */
    Route::get('{category}/alumni', 'AlumniController@index')->name('alumni.index');
    Route::post('alumni', 'AlumniController@store')->name('alumni.store');
});