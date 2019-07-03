<?php

Route::namespace('Modules\ContentManagement\Http\Controllers')->middleware('access:admin.content-management')->prefix('admin/content-management')->name('admin.content-management.')->group(function(){
    Route::get('about-us', 'AboutUsController@index')->name('about-us.index');
    Route::post('about-us/{category}/{id}', 'AboutUsController@update')->name('about-us.update');

    Route::get('message', 'MessageController@index')->name('message.index');
    Route::post('message/{category}/{id}', 'MessageController@update')->name('message.update');
    
    Route::resource('achievements', 'AchievementController', ['only' => ['index','edit','update']]);

    Route::resource('facilities', 'FacilityController');
});

/** Frontend Routes */
Route::group(['namespace' => 'Modules\ContentManagement\Http\Controllers\Frontend'], function() {
    /** About us Routes */
    Route::get('{category}/about-us', 'AboutUsController@index')->name('about-us.index');

    /** Facilities Routes */
    Route::get('{category}/facilities', 'FacilityController@index')->name('facilities.index');
});
