<?php
Route::group(['prefix' => 'doctor', 'as' => 'doctor.', 'namespace' => 'doctor', 'middleware' => ['auth','doctor']], function () {


    Route::get('/', 'HomeController@index')->name('home');

    // Reservation 
    Route::delete('reservations/destroy', 'ReservationController@massDestroy')->name('reservations.massDestroy');
    Route::resource('reservations', 'ReservationController');
});
