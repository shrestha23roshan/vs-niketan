<?php

Route::namespace('Modules\BulletinBoardManagement\Http\Controllers')->middleware('access:admin.bulletin-board-management')->prefix('admin/bulletin-board-management')->name('admin.bulletin-board-management.')->group(function(){
    Route::resource('news', 'NewsController');
    Route::resource('notice', 'NoticeController');
    Route::resource('event', 'EventController');
});

/** Frontend Routes */
Route::group(['namespace' => 'Modules\BulletinBoardManagement\Http\Controllers\Frontend'], function() {
    /** Event Routes */
    Route::get('{category}/event', 'EventController@index')->name('event.index');
    Route::get('{category}/event/{slug}', 'EventController@show')->name('event.show');

    /** News Routes */
    Route::get('{category}/news', 'NewsController@index')->name('news.index');
    Route::get('{category}/news/{slug}', 'NewsController@show')->name('news.show');

    /** Notice Routes */
    Route::get('{category}/notice', 'NoticeController@index')->name('notice.index');
    Route::get('{category}/notice/{slug}', 'NoticeController@show')->name('notice.show');
    
});