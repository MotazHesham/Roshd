<?php
Route::group(['prefix' => 'doctor', 'as' => 'doctor.', 'namespace' => 'doctor', 'middleware' => ['auth','doctor']], function () {


    Route::get('/', 'HomeController@index')->name('home');
});
