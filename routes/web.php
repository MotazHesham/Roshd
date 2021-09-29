<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Specialization
    Route::delete('specializations/destroy', 'SpecializationController@massDestroy')->name('specializations.massDestroy');
    Route::resource('specializations', 'SpecializationController');

    // Clinic
    Route::delete('clinics/destroy', 'ClinicController@massDestroy')->name('clinics.massDestroy');
    Route::resource('clinics', 'ClinicController');

    // Center Service
    Route::delete('center-services/destroy', 'CenterServiceController@massDestroy')->name('center-services.massDestroy');
    Route::resource('center-services', 'CenterServiceController');

    // Salary Contract
    Route::delete('salary-contracts/destroy', 'SalaryContractController@massDestroy')->name('salary-contracts.massDestroy');
    Route::resource('salary-contracts', 'SalaryContractController');

    // Precentage Contract
    Route::delete('precentage-contracts/destroy', 'PrecentageContractController@massDestroy')->name('precentage-contracts.massDestroy');
    Route::resource('precentage-contracts', 'PrecentageContractController');

    // Group
    Route::delete('groups/destroy', 'GroupController@massDestroy')->name('groups.massDestroy');
    Route::post('groups/media', 'GroupController@storeMedia')->name('groups.storeMedia');
    Route::post('groups/ckmedia', 'GroupController@storeCKEditorImages')->name('groups.storeCKEditorImages');
    Route::resource('groups', 'GroupController');

    // Center Services Packages
    Route::delete('center-services-packages/destroy', 'CenterServicesPackagesController@massDestroy')->name('center-services-packages.massDestroy');
    Route::resource('center-services-packages', 'CenterServicesPackagesController');

    // Allowances
    Route::delete('allowances/destroy', 'AllowancesController@massDestroy')->name('allowances.massDestroy');
    Route::resource('allowances', 'AllowancesController');

    // Reservation
    Route::delete('reservations/destroy', 'ReservationController@massDestroy')->name('reservations.massDestroy');
    Route::resource('reservations', 'ReservationController');

    // Doctor
    Route::delete('doctors/destroy', 'DoctorController@massDestroy')->name('doctors.massDestroy');
    Route::resource('doctors', 'DoctorController');

    // Editors
    Route::delete('editors/destroy', 'EditorsController@massDestroy')->name('editors.massDestroy');
    Route::resource('editors', 'EditorsController');

    // Student
    Route::delete('students/destroy', 'StudentController@massDestroy')->name('students.massDestroy');
    Route::resource('students', 'StudentController');

    // Experience
    Route::delete('experiences/destroy', 'ExperienceController@massDestroy')->name('experiences.massDestroy');
    Route::resource('experiences', 'ExperienceController');

    // Education
    Route::delete('education/destroy', 'EducationController@massDestroy')->name('education.massDestroy');
    Route::resource('education', 'EducationController');

    // Activates
    Route::delete('activates/destroy', 'ActivatesController@massDestroy')->name('activates.massDestroy');
    Route::post('activates/media', 'ActivatesController@storeMedia')->name('activates.storeMedia');
    Route::post('activates/ckmedia', 'ActivatesController@storeCKEditorImages')->name('activates.storeCKEditorImages');
    Route::resource('activates', 'ActivatesController');

    // Contactus
    Route::delete('contactus/destroy', 'ContactusController@massDestroy')->name('contactus.massDestroy');
    Route::resource('contactus', 'ContactusController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingsController');

    // Advice
    Route::delete('advice/destroy', 'AdviceController@massDestroy')->name('advice.massDestroy');
    Route::resource('advice', 'AdviceController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
