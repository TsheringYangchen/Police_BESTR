<?php
use Illuminate\Support\Facades\Input;
/*
 * Admin Routes
 */
Route::prefix('admin')->group(function() {

    Route::middleware('auth:admin')->group(function() {
        // Dashboard
        Route::get('/', 'DashboardController@index');

        // Products
        Route::resource('/products','ProductController');

        // Users
        Route::resource('/users','UsersController');

        // Logout
        Route::get('/logout','AdminUserController@logout');

    });

    // Admin Login
    Route::get('/login', 'AdminUserController@index');
    Route::post('/login', 'AdminUserController@store');
});
//admin routes

/*
 * Front Routes
 */
    Route::get('/', 'Front\HomeController@index');
    Route::get('admin/viewLicense', 'Front\RegistrationController@viewLicense')->middleware('auth:admin');
    Route::get('/search', 'Front\RegistrationController@search');
    

    //BIN/EIN
    Route::post('/getbin','BinController@store');
    Route::post('/getein','EinController@store');
    Route::get('admin/viewbin', 'BinController@viewbin')->middleware('auth:admin');
    Route::get('admin/viewein', 'EinController@viewein')->middleware('auth:admin');
    Route::get('/searchbin', 'BinController@search');
    Route::get('/searchein', 'EinController@search');

    Route::get('admin/license-edit/{id}','Front\RegistrationController@editLicense')->middleware('auth:admin');
    Route::put('/licenseupdate/{id}','Front\RegistrationController@update');
    
    Route::get('/deleteLH/{id}','Front\RegistrationController@deleteLicense');
    Route::post('front/licensee-login','Front\RegistrationController@Holder');

    //Providers Login Try
    //Route::post('/issuer/login','IssuerController@Provider');

    Route::post('/provider/register','IssuerController@provide')->name('issuer')->middleware('auth:admin');
    Route::get('/deleteIR/{id}','IssuerController@deleteIssuer');
    Route::get('/searchIR', 'IssuerController@find');

    Route::get('admin/viewIssuer', 'IssuerController@viewIssuer')->middleware('auth:admin');
    Route::get('admin/issuers/create', 'IssuerController@index')->middleware('auth:admin');
    Route::get('admin/issuer-edit/{id}','IssuerController@editIssuer')->middleware('auth:admin');
    Route::put('/updateissuer/{id}','IssuerController@update');

    // User Registration //License Holders //Providers
    //Route::get('/user/register','Front\RegistrationController@index');
    //Route::post('/user/register','Front\RegistrationController@store');
    
    Route::post('/license/register','Front\RegistrationController@license');

    // User Login
        Route::get('/user/login','Front\SessionsController@index');
        Route::post('/user/login','Front\SessionsController@store');

        // Logout
        Route::get('/user/logout','Front\SessionsController@logout');
        Route::get('/user/profile', 'Front\UserProfileController@index');
        Route::get('/user/order/{id}','Front\UserProfileController@show');

        //Route for remaining frontend
        Route::get('/download','RouteController@download');
        Route::get('/licensee-login','RouteController@licensee');
        Route::get('/bin','RouteController@bin');
        Route::get('/ein','RouteController@ein')->name('ein');
        Route::get('/infringement','RouteController@infringement')->name('infringe');
        Route::get('/License-Status','RouteController@status')->name('status');
        Route::get('/changepw','RouteController@changepw');
        

        

