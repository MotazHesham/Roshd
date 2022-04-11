<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/login', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth','staff']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::post('user-alerts/read', 'UserAlertsController@read')->name('alert.read');
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
    Route::resource('salary-contracts', 'SalaryContractController')->except([
        'create']);
    Route::get('salary-contracts/create/{id}','SalaryContractController@create')->name('salary-contracts.create');  


    // Precentage Contract
    Route::delete('precentage-contracts/destroy', 'PrecentageContractController@massDestroy')->name('precentage-contracts.massDestroy');
    Route::resource('precentage-contracts', 'PrecentageContractController')->except([
        'create']);
    Route::get('precentage-contracts/create/{id}','PrecentageContractController@create')->name('precentage-contracts.create');  


    // Group
    Route::post('groups/media', 'GroupController@storeMedia')->name('groups.storeMedia');
    Route::post('groups/ckmedia', 'GroupController@storeCKEditorImages')->name('groups.storeCKEditorImages');
    Route::delete('groups/destroy', 'GroupController@massDestroy')->name('groups.massDestroy');
    Route::resource('groups', 'GroupController');

    // Center Services Packages
    Route::delete('center-services-packages/destroy', 'CenterServicesPackagesController@massDestroy')->name('center-services-packages.massDestroy');
    Route::resource('center-services-packages', 'CenterServicesPackagesController');

    // Allowances
    Route::delete('allowances/destroy', 'AllowancesController@massDestroy')->name('allowances.massDestroy');
    Route::resource('allowances', 'AllowancesController');

    // Reservation
    Route::post('reservations/ranges', 'ReservationController@ranges')->name('reservations.ranges');
    Route::delete('reservations/destroy', 'ReservationController@massDestroy')->name('reservations.massDestroy');
    Route::resource('reservations', 'ReservationController');

    // Doctor
    Route::delete('doctors/destroy', 'DoctorController@massDestroy')->name('doctors.massDestroy');
    Route::resource('doctors', 'DoctorController');

    // Student
    Route::delete('students/destroy', 'StudentController@massDestroy')->name('students.massDestroy');
    Route::resource('students', 'StudentController');

    // GroupStudent
    Route::get('group_student/change_status/{raw_id}/{status}', 'GroupStudentController@change_status')->name('group-student.change_status');
    Route::post('group_student/store', 'GroupStudentController@store')->name('group-student.store');
    Route::delete('group_student/destroy/{raw_id}', 'GroupStudentController@destroy')->name('group-student.destroy');

    // Experience
    Route::delete('experiences/destroy', 'ExperienceController@massDestroy')->name('experiences.massDestroy');
    Route::resource('experiences', 'ExperienceController')->except([
        'create']);
    Route::get('experiences/create/{id}','ExperienceController@create')->name('experiences.create');  


    // Education
    Route::delete('education/destroy', 'EducationController@massDestroy')->name('education.massDestroy');
    Route::resource('education', 'EducationController')->except([
        'create']);
    Route::get('education/create/{id}','EducationController@create')->name('education.create');  

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

    // patients
    Route::post('patients/store_patient_package', 'PatientController@store_patient_package')->name('package-patient.store');
    Route::delete('patients/destroy_patient_package/{raw_id}', 'PatientController@destroy_patient_package')->name('package-patient.destroy');
    Route::delete('patients/destroy', 'PatientController@massDestroy')->name('patients.massDestroy');
    Route::resource('patients', 'PatientController');

    // Advice
    Route::delete('advice/destroy', 'AdviceController@massDestroy')->name('advice.massDestroy');
    Route::resource('advice', 'AdviceController');

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::post('expenses/media', 'ExpenseController@storeMedia')->name('expenses.storeMedia');
    Route::post('expenses/ckmedia', 'ExpenseController@storeCKEditorImages')->name('expenses.storeCKEditorImages');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::post('incomes/media', 'IncomeController@storeMedia')->name('incomes.storeMedia');
    Route::post('incomes/ckmedia', 'IncomeController@storeCKEditorImages')->name('incomes.storeCKEditorImages');
    Route::resource('incomes', 'IncomeController');

    // Blogs
    Route::delete('blogs/destroy', 'BlogsController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogsController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogsController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::resource('blogs', 'BlogsController');

    // Expense Report
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServicesController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServicesController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::resource('services', 'ServicesController');


    Route::post('payments/partials_edit', 'PaymentsController@edit_partials')->name('payments.edit_partials');
    Route::post('payments/show_payments', 'PaymentsController@show_payments')->name('payments.show_payments');
    Route::resource('payments', 'PaymentsController');

    ///
        // Types Of Degrees
        Route::delete('types-of-degrees/destroy', 'TypesOfDegreesController@massDestroy')->name('types-of-degrees.massDestroy');
        Route::resource('types-of-degrees', 'TypesOfDegreesController');
   

    Route::Put('/update_status/{id}','ReservationController@update_status')->name('reservations.update_status');

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
