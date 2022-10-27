<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

//Les Routes des Permissions
Route::get('/deletePermission/{permission}','MainController@deletePermission');
Route::post('/updatePermissionAjax','MainController@updatePermissionAjax');
Route::get('/editPermission/{permission}','MainController@editPermission');
Route::post('/savePermissionAjax','MainController@savePermissionAjax');
Route::get('/addPermission','MainController@addPermission');
Route::get('/permissions','MainController@permissions');

//Les Routes des Structures
Route::get('/deleteStructure/{structure}','MainController@deleteStructure');
Route::post('/updateStructureAjax','MainController@updateStructureAjax');
Route::get('/editStructure/{structure}','MainController@editStructure');
Route::post('/saveStructureAjax','MainController@saveStructureAjax');
Route::get('/addStructure','MainController@addStructure');
Route::get('/structures','MainController@structures');
Route::get('/status_update/{structure}','MainController@status_update');

//Les routes des Franchises 
Route::get('/deleteFranchise/{franchise}','MainController@deleteFranchise');
Route::post('/updateFranchiseAjax','MainController@updateFranchiseAjax');
Route::get('/editFranchise/{franchise}','MainController@editFranchise');
Route::post('/saveFranchiseAjax','MainController@saveFranchiseAjax');
Route::get('/addFranchise','MainController@addFranchise');
Route::get('/franchises','MainController@franchises');
Route::get('/status_updatef/{franchise}','MainController@status_updatef');

//Les Routes de Login
Route::get('/logout','MainController@logout');
Route::get('/home','MainController@home');
Route::get('/home-user','MainController@homeUser');
Route::get('/login','LoginController@login');
Route::get('/','LoginController@login');
Route::get('/admin','LoginController@loginAdmin');
Route::post('/loginAjax','LoginController@loginAjax');


