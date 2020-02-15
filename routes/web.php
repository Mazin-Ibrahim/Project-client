<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|----------------------------- ---------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function()
     {

        Route::get('/app','CountController@control')->name('control');
        Route::resource('tecnicals','TecnicalController');
        Route::resource('devices','DeviceController');
        Route::resource('maintenances','MaintenanceController');
        Route::resource('areas','AreaController');
        Route::resource('towns','TownController');
        Route::resource('clients','ClientController');
        Route::resource('ClientMains','ClientMainController');
        Route::resource('users','UserController');
        Route::resource('notices','NoticeController');

 

        Route::get('getTown/{id}','ClientController@getTown');

        // this route get all clients by area
        Route::post('/search','ClientTaskController@searchClientArea')->name('searchClientArea');
        Route::get('/areaTown/{id}','ClientTaskController@areaTown')->name('areaTown');
        
        // this routes get all client maintenance based on duration between tow date
        Route::get('/repoetDate','ReportController@showClientMaintenanceDate')->name('repoetDate');
        Route::post('/byDate','ReportController@getClientMaintenanceDate')->name('byDate');
        
        
        Route::get('/controlReport','ReportController@ControlReport')->name('ControlReport');
        
        // this routes get all clients based on towns
        Route::get('/showClientTown','ReportController@showClientTown')->name('showClientTown');
        Route::post('/getClientTown','ReportController@getClientTown')->name('getClientTown');
        
        // this routes get all clients based on areas
        Route::get('/showClientArea','ReportController@showClientArea')->name('showClientArea');
        Route::post('/getClientArea','ReportController@getClientArea')->name('getClientArea');
        
        // this routes get all clients based on maintenances it done
        Route::get('/showMainDone','ReportController@showMainDone')->name('showMainDone');
        Route::post('/getMainDone','ReportController@getMainDone')->name('getMainDone');
        
        // this routes get all clients based on maintenances it doesn't
        Route::get('/showMainNot','ReportController@showMainNot')->name('showMainNot');
        Route::post('/getMainNot','ReportController@getMainNot')->name('getMainNot');
        
        // this routes print the reports to pdf
        Route::get('/byDataPrint','PdfReportController@byDataPrint')->name('byDataPrint');
        Route::get('/byMainDonePrint','PdfReportController@byMainDonePrint')->name('byMainDonePrint');
        Route::get('/byMainNotPrint','PdfReportController@byMainNotPrint')->name('byMainNotPrint');
        Route::get('/allClientTownPrint/{id}','PdfReportController@allClientTownPrint')->name('allClientTownPrint');
        Route::get('/allClientAreaPrint/{id}','PdfReportController@allClientAreaPrint')->name('allClientAreaPrint');
        Route::get('/allClientPrint','PdfReportController@allClientPrint')->name('allClientPrint');
        
        Route::get('/getPermissions/{type}','UserController@getPermissions')->name('getPermissions');
        Route::get('/townClear/{id}','TownController@TownDelete')->name('TownDelete');
        Route::get('/clientClear/{id}','ClientController@clientClear')->name('clientClear');



    
     });




// Route::get('/ClientJson','ClientController@ClientJson')-name('ClientJson');


 Auth::routes();

Route::get('/getlogout',function(){
        Auth::logout();
        return redirect('/login');
})->name('getLogout');

Route::get('/',function(){
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test',function(){
 dd(Auth::guard('tecnical-api'));
});

