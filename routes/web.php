<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PageController@index');
Route::get('/contact', 'PageController@contactPage')->name('contact');
Route::post('/currency/set', 'PageController@setCurrency')->name('set-currency');

Route::get('/check-eta-status', 'PageController@checkEta')->name('check-eta-status');
Route::get('/application', 'PageController@application')->name('application');
Route::get('/my/{groupId}/{applicantId}', 'ApplicationController@details')->name('details');
Route::get('/checkout/my/{groupId}/{applicantId}', 'ApplicationController@checkoutIndex')->name('checkout');
Route::get('/page/{slug}', 'PageController@pageInformation');
Route::post('/saveFirstStage', 'ApplicationController@saveApplicationFirstStage')->name('save-first-stage');
Route::post('/saveSecondStage', 'ApplicationController@saveApplicationSecondStage')->name('save-second-stage');
Route::get('/country/get_by_visa_type', 'ApplicationController@get_by_visa_type')->name('visa.get_by_visa_type');



Route::group(['prefix' => 'admins','middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DataController@processingApplicatnt');

    Route::post('/user/add', 'UserController@store')->name('addUser');
    Route::get('/user', 'UserController@registration')->name('user-register');
    Route::get('/activity-log', 'LogActivityController@activityLogView')->name('activity-log');

    Route::get('/category', 'CategoryController@manageCategory')->name('category');
    Route::get('/content/manage', 'ContentController@manageContents')->name('manage-content');

    Route::post('/category/add', 'CategoryController@saveCategory')->name('category.add');


    Route::get('/content/new', 'ContentController@newContent')->name('new-content');
    Route::post('/content/edit', 'ContentController@editContent')->name('edit-content');
    Route::post('/content/update', 'ContentController@updateContent')->name('update-content');
    Route::post('/content/add', 'ContentController@saveContent')->name('add-content');
    Route::get('/basic/information', 'BasicInformationController@index')->name('basic-info');
    Route::get('/data', 'DataController@index')->name('data');

    Route::get('/data/unpaid', 'DataController@unpaidApplicatnt')->name('unpaid');
    Route::get('/data/processing', 'DataController@processingApplicatnt')->name('processing');
    Route::get('/data/incomplete', 'DataController@incompleteApplicatnt')->name('incomplete');
    Route::get('/data/approved', 'DataController@approvedApplicatnt')->name('approved');
    Route::get('/data/onHold', 'DataController@onHoldApplicatnt')->name('onhold');
    Route::get('/data/refund', 'DataController@refundApplicatnt')->name('refund');
    Route::get('/data/rejected', 'DataController@rejectedApplicatnt')->name('rejected');


    Route::get('/application/{groupId}/{applicantId}/{status}', 'ApplicationController@editApplication');

    Route::post('/adminNotify', 'AdminApplicationController@statusVisaFileNotify')->name('edit-status-visafile-notify');
    Route::post('/adminPayment', 'AdminApplicationController@editVisaPaymentNotify')->name('edit-visa-payment-notify');
    Route::post('/adminSecondStage', 'AdminApplicationController@saveApplicationSecondStage')->name('admin-save-second-stage');
    Route::post('/addApplicant', 'AdminApplicationController@saveApplicationFirstStage')->name('admin-new-applicant');
    Route::DELETE('/applicant/delete', 'AdminApplicationController@deleteApplicant')->name('delete-applicant');
    Route::DELETE('/applicants/delete', 'AdminApplicationController@deleteAllApplicant')->name('delete-all-applicant');

    Route::get('/appconfig/{s}', 'PageController@appProcess');
    Route::get('/approved/{s}', 'PageController@approvedProcess');
    Route::get('/processing/{s}', 'PageController@processingProcess');
    Route::get('/pending/{s}', 'PageController@pendingProcess');
    Route::get('/onhold/{s}', 'PageController@onHoldProcess');
    Route::get('/rejected/{s}', 'PageController@rejectedProcess');
    Route::get('/delivered/{s}', 'PageController@deliveredProcess');
    Route::get('/canceled/{s}', 'PageController@canceledProcess');
    Route::get('/inAustralia/{s}', 'PageController@inAustraliaProcess');

    Route::get('/country', 'CountryController@manageCountry')->name('country');
    Route::post('/country/add', 'CountryController@saveCountry')->name('add-country');
    Route::post('/country/update', 'CountryController@updateCountry')->name('update-country');
    Route::DELETE('/country/delete', 'CountryController@deleteCountry')->name('delete-country');

    Route::get('/currency', 'CurrencyController@manageCurrency')->name('currency');
    Route::post('/currency/add', 'CurrencyController@saveCurrency')->name('add-currency');

    Route::DELETE('/currency/delete', 'CurrencyController@deleteCurrency')->name('delete-currency');


    Route::post('/basic/add', 'BasicInformationController@saveInfo')->name('basic-info-add');
    Route::post('/basic/update', 'BasicInformationController@updateInfo')->name('basic-info-update');

    Route::get('/payment/settings', 'PaymentGateSettingController@index')->name('payment-info');
    Route::post('/payment/add', 'PaymentGateSettingController@saveInfo')->name('payment-info-add');
    Route::get('/payment/hash', 'ApplicationController@createSenangHash')->name('payment-hash');

    Route::post('/category/update', 'CategoryController@updateCategory')->name('update-category');
    Route::DELETE('/category/delete', 'CategoryController@deleteCategory')->name('delete-category');
    Route::DELETE('/content/delete', 'ContentController@deleteContent')->name('delete-content');
    Route::get('/category/get_by_display_type', 'CategoryController@get_by_display_type')->name('admin.insurance.get_by_category_display');
});

