<?php
Route::group(['prefix' => 'patient', 'as' => 'patient.', 'namespace' => 'patient', 'middleware' => ['auth','patient']], function () {
    
    Route::get('/', 'HomeController@index')->name('home');

    // Reservation
    Route::post('reservations/ranges', 'ReservationController@ranges')->name('reservations.ranges');
    Route::delete('reservations/destroy', 'ReservationController@massDestroy')->name('reservations.massDestroy');
    Route::resource('reservations', 'ReservationController');

});