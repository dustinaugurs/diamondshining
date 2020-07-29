<?php
/**
 * DiamondTemplates
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

   
    Route::group( ['namespace' => 'DiamondTemplates'], function () {
		Route::get('diamondtemplates/addPrice/{id}', 'DiamondTemplatesController@addPrice');
		Route::match(['get', 'post'], 'diamondtemplates/savePrice', 'DiamondTemplatesController@savePrice');
		
        Route::resource('diamondtemplates', 'DiamondTemplatesController');
        //For Datatable
        Route::post('diamondtemplates/get', 'DiamondTemplatesTableController')->name('diamondtemplates.get');
		 });
    
});