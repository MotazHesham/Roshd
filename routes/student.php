<?php
Route::group(['prefix' => 'student', 'as' => 'student.', 'namespace' => 'student', 'middleware' => ['auth','student']], function () {

    
    Route::get('/', 'HomeController@index')->name('home');
});