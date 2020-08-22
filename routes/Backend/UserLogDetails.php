<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('userlogdetails', 'UserLogManagement\SessionController@index')->name('userlogdetails');
Route::get('userLogFilter', 'UserLogManagement\SessionController@userLogFilter')->name('userLogFilter');

Route::post('userLogDelete', 'UserLogManagement\SessionController@userLogDelete')->name('userLogDelete');
Route::get('userLogDetails/{id}', 'UserLogManagement\SessionController@userLogDetails')->name('userLogDetails');



