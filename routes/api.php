<?php



Route::get('/getAreas','AreaController@getAreas')->name('getAreas');
Route::get('/getTowns/{id}','AreaController@getTowns')->name('getTowns');
Route::get('/allTowns','AreaController@allTowns')->name('allTowns');
Route::get('/getClients/{id}','ClientController@getClients')->name('getClients');
Route::get('/allClients','ClientController@allClients')->name('allClients');



// -------------------application---------------------

Route::get('/areas','Api\AreaController@areas');
Route::get('/towns','Api\TownController@towns');
Route::get('/clientMainByDateAndTecnical','Api\ClientMainController@clientMainByDateAndTecnical');
Route::get('/clientMainByDateAndClient','Api\ClientMainController@clientMainByDateAndClient');
Route::post('/storeNotice','Api\NoticeController@storeNotice');





Route::post('userlogin', 'Api\User\Auth\LoginController@login');
Route::post('tecnicallogin', 'Api\Tecincal\Auth\LoginController@login');










