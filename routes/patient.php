<?php
Route::group(['prefix' => 'patient', 'as' => 'patient.', 'namespace' => 'patient', 'middleware' => ['auth','patient']], function () {

    
    Route::get('/', 'HomeController@index')->name('home');
});