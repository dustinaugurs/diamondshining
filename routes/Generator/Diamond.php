<?php
/**
 * Routes for : Diamond
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'Diamond'], function () {
	    Route::get('diamonds', 'DiamondsController@index')->name('diamonds.index');
	    
	    
	    
	    //For Datatable
	    Route::post('diamonds/get', 'DiamondsTableController')->name('diamonds.get');
	});
	
});