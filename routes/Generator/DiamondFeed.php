<?php
/**
 * DiamondFeeds
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'DiamondFeeds'], function () {
        Route::resource('diamondfeeds', 'DiamondFeedsController');       
        //For Datatable
        Route::post('diamondfeeds/get', 'DiamondFeedsTableController')->name('diamondfeeds.get');
    });
    
});