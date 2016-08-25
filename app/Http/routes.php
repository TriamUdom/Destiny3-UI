<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
| Public accessible routes
| TODO: Modify IE middleware to also disallow old Chromes and Firefoxes as well - they can also cause issues.
*/
Route::get('/', 'UIPages@homePage');

// Login & logout
Route::post('login', 'APIController@login');
Route::get('logout', 'APIController@logout');

// About page
Route::get('about', 'UIPages@aboutPage');

// Frequently asked questions page
Route::get('faq', 'UIPages@faqPage');

/*
| Front-end pages for the applicant. All of these requires login.
| TODO: Add login verification middleware
*/
Route::group(['prefix' => 'application', 'middleware' => ['web']], function(){

    // First step application page (account creation)
    Route::get('begin', 'UIPages@newUserRegistrationPage');

    /* TODO: Add login checker middleware for the routes below */

    // Dashboard
    Route::get('home', 'UIPages@applicantDashboard');

    // Change password
    Route::get('change_password', 'UIPages@changePasswordPage');

});

/*
| API Routes (v1)
*/
Route::group(['prefix' => 'api/v1', 'middleware' => ['web']], function(){

    /*
    NOTE: These routes won't work yet - there's no backend handler for it!
    This is just for planning purposes.
    */

    // Account creation
    Route::post('account/create', 'APIController@createAccount');

    // TODO: Add auth middlewares for API routes below:

    // Get applicant data. Simple!
    Route::get('applicant/data', 'Blah@Blah');

    // Partial data submission. Probably would get JSON of everything and process accordingly.
    Route::post('applicant/data', 'Blah@Blah');

    // Submit complete data & get PDF. Using GET here 'cause the client will directly access this URL.
    Route::get('applicant/submit', 'Blah@Blah');

    // Password change handler
    Route::post('account/change_password', 'APIController@changePassword');

});
