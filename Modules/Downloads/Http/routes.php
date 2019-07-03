<?php

Route::namespace('Modules\Downloads\Http\Controllers')->middleware('access:admin.download')->prefix('admin/download')->name('admin.download.')->group(function(){
    Route::resource('result', 'ResultController');
    Route::resource('admission-form', 'AdmissionFormController');
});

/** Frontend Routes */
Route::group(['namespace' => 'Modules\Downloads\Http\Controllers\Frontend'], function() {
    /** Admission Form Routes */
    Route::get('{category}/admission-form', 'AdmissionFormController@index')->name('admission-form.index');

    /** Result Routes */
    Route::get('{category}/result', 'ResultController@index')->name('result.index');
});
    