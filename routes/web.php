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
Route::get('/Main','Controller@index');
Route::get('/','Controller@login')->name('Login');
Route::get('/OnHold','Controller@countonhold')->name('OnHold');

Route::post('/SignIn','Controller@sign_in')->name('SignIn');
Route::get('/SignOut','Controller@sign_out')->name('SignOut');

Route::post('/EditAccount','Controller@edit_account')->name('EditAccount');

Route::get('/Dashboard', 'Controller@dashboard')->name('Dashboard');



//MIDDLE MAN ROUTES
Route::group(['prefix' => ''], function (){


    Route::get('/Validate', 'ValidateController@index')
        ->name('Validate');

    Route::POST('/LoadReportAttachments', 'ValidateController@view')
        ->name('LoadReportAttachments');

    Route::POST('/SendToOfficials', 'ValidateController@send_to_officials')
        ->name('SendToOfficials');      

    Route::POST('/RemoveReport', 'ValidateController@remove_invalid_report')
        ->name('RemoveReport');

    Route::GET('/List_Of_Validated_Reports', 'ValidateController@list_of_validated_report')
        ->name('List_Of_Validated_Reports');


    Route::GET('/List_Of_Invalid_Reports', 'ValidateController@list_of_invalid_report')
        ->name('List_Of_Invalid_Reports');

    Route::POST('/GenerateInvalidReports', 'ValidateController@filter_invalid_reports')
        ->name('GenerateInvalidReports');


    Route::POST('/GenerateValidatedReports', 'ValidateController@filter_validated_reports')
        ->name('GenerateValidatedReports');



 
});




//OFFICIALS ROUTES
Route::group(['prefix' => ''], function (){


    Route::get('/Verify', 'VerifyController@index')
        ->name('Verify');

    // Route::POST('/LoadReportAttachments', 'ValidateController@view')
    //     ->name('LoadReportAttachments');

    // Route::POST('/SendToOfficials', 'ValidateController@send_to_officials')
    //     ->name('SendToOfficials');      

    // Route::POST('/RemoveReport', 'ValidateController@remove_invalid_report')
    //     ->name('RemoveReport');

    // Route::GET('/List_Of_Validated_Reports', 'ValidateController@list_of_validated_report')
    //     ->name('List_Of_Validated_Reports');


    // Route::GET('/List_Of_Invalid_Reports', 'ValidateController@list_of_invalid_report')
    //     ->name('List_Of_Invalid_Reports');

    // Route::POST('/GenerateInvalidReports', 'ValidateController@filter_invalid_reports')
    //     ->name('GenerateInvalidReports');


    // Route::POST('/GenerateValidatedReports', 'ValidateController@filter_validated_reports')
    //     ->name('GenerateValidatedReports');



 
});


