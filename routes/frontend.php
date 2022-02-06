<?php

Route::get('/','Frontend\HomeController@home')->name('frontend.home');

Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function(){
    
    Route::get('about','AboutUsController@about')->name('about');
    
    // services
    Route::get('services','ServicesController@services')->name('services');
   // Route::get('service/{type}','ServicesController@service')->name('service');
    Route::get('service/{id}','ServicesController@service')->name('service');
    
    // doctors
    Route::get('team','TeamsController@team')->name('team');
    Route::get('doctor/{id}','TeamsController@doctor')->name('doctor');
    
    // activites
    Route::get('activties','ActivtiesController@activties')->name('activties');
    Route::get('activity/{id}','ActivtiesController@activity')->name('activity');
    
    // courses
    Route::get('courses','CoursesController@courses')->name('courses');
    Route::get('course/{id}','CoursesController@course')->name('course');
    Route::get('course/join/{id}','CoursesController@course_join')->name('courses.join');
    
    Route::get('consulting','ConsultingController@consulting')->name('consulting');
    Route::post('consulting/store','ConsultingController@store')->name('consulting.store');
    
    Route::get('contactus','ContactUsController@contactus')->name('contactus');
    Route::post('contactus/store','ContactUsController@store')->name('contactus.store');

    Route::get('signup','HomeController@signup')->name('signup');
    Route::post('signup_user','HomeController@signup_user')->name('signup_user');
    Route::view('user_login', 'frontend.signin')->name('login');
    Route::view('account', 'frontend.account')->name('account')->middleware('auth');;
    Route::post('update_account','HomeController@UpdateProfile')->name('account.update');
   

    //
    
    Route::resource('reservations','ReservationController')->middleware(['auth','patient']);
    Route::post('reservations/ranges', 'ReservationController@ranges')->name('reservations.ranges');
    Route::resource('groups', 'GroupController')->middleware(['auth','student']);

    //blogs
    Route::get('blogs','BlogController@blogs')->name('blogs');
});