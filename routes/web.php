<?php

use App\Http\Controllers\ImportController;

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
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('/register', 'Auth\RegisterController@register');
});

Auth::routes(['verify' => true]);

Route::get('login', array('as'=>'login',function () {
    return redirect()->route('voyager.login');
}));

Route::get('/', function () {
    return redirect()->route('voyager.login');
});


//Reporting
Route::post('/get-data-login', 'ReportingController@getDataLogin')->name('get-data-login');
Route::post('/get-data-register', 'ReportingController@getDataRegister')->name('get-data-register');

Route::get('login-pdf-view/{startDateLogin}/{endDateLogin}',array('as'=>'login-pdf-view','uses'=>'ReportingController@loginPDFView'));
Route::get('register-pdf-view/{dateTypeRegister}/{startDateRegister}/{endDateRegister}',array('as'=>'register-pdf-view','uses'=>'ReportingController@RegisterPDFView'));
Route::get('register-csv-export/{startDateRegister}/{endDateRegister}',array('as'=>'register-csv-export','uses'=>'ReportingController@RegisterCSVExport'));

Route::post('/register', 'Auth\RegisterController@storeUser')->name('register');
Route::post('/view-player-dashboard-by-account-id', 'Voyager\VoyagerController@viewPlayerDashBoardByAccountId')->name('view-player-dashboard-by-account-id');
Route::get('/view-player-dashboard-by-account-id/{account_id}', 'Voyager\VoyagerController@getViewPlayerDashBoardByAccountId');

Route::get('forget-password', 'Auth\ForgotPasswordController@getEmail');
Route::post('forget-password', 'Auth\ForgotPasswordController@postEmail');

Route::get('reset-password/{token}', 'Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'Auth\ResetPasswordController@updatePassword');
