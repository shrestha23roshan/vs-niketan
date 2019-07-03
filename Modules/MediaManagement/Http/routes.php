<?php

Route::namespace('Modules\MediaManagement\Http\Controllers')->middleware('access:admin.media-management')->prefix('admin/media-management')->name('admin.media-management.')->group(function(){
    //for banner
    Route::resource('banner', 'BannerController');
    //for gallery
    Route::resource('gallery', 'GalleryController');
    //for gallery pgoto
    Route::get('gallery/{id}/photo', 'GalleryPhotoController@show')->name('gallery.photo.show');
    Route::get('gallery/{id}/photo/create', 'GalleryPhotoController@create')->name('gallery.photo.create');
    Route::post('gallery/{id}/photo/store', 'GalleryPhotoController@store')->name('gallery.photo.store');
  
    Route::delete('gallery/photo/{id}', 'GalleryPhotoController@destroy');

    //for video
    Route::resource('video', 'VideoController');
});

/** Frontend Routes */
Route::group(['namespace' => 'Modules\MediaManagement\Http\Controllers\Frontend'], function() {
    /** Gallery Routes */
    Route::get('{category}/gallery', 'GalleryController@index')->name('gallery.index');
    Route::get('{category}/gallery/{slug}', 'GalleryController@show')->name('gallery.show');

    /** Video Routes */
    Route::get('{category}/video', 'VideoController@index')->name('video.index');
    Route::get('{category}/video/{slug}', 'VideoController@show')->name('video.show');
    
});