<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::post('/get/states', 'FrontendController@getStates')->name('get.states');
Route::post('/get/cities', 'FrontendController@getCities')->name('get.cities');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {

        // Route::get('getCurrency', 'ProductController@get_currency')->name('getCurrency');
		
		Route::get('our-products', 'ProductController@ourProduct')->name('our-products');
		Route::get('search-products', 'ProductController@SearchourProduct')->name('search-products');
        // Route::get('our-products/{base}', 'ProductController@ourProduct')->name('our-products');
         Route::get('send_notification/', 'ProductController@send_notification')->name('send_notification');
         
         //----deepak-enquiry-order-----
         Route::get('enquiry-order', 'EnquiryOrderController@index')->name('enquiry-order');
         Route::get('orders', 'EnquiryOrderController@orders')->name('orders');
         Route::get('enquiries', 'EnquiryOrderController@enquiries')->name('enquiries');
         Route::get('ordersCompleted', 'EnquiryOrderController@ordersCompleted')->name('ordersCompleted');
         Route::get('ordersCancelled', 'EnquiryOrderController@enquiries')->name('ordersCancelled');
		
       
	   
        Route::get('product_detail/{id}', 'ProductController@productDetail')->name('product-detail');
        Route::get('ajax_get_products', 'ProductController@ajax_get_products');
		Route::get('get_currency', 'ProductController@get_currency');

        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        Route::POST('account/mycurrency', 'AccountController@currencyUpdate')->name('account');
        //Route::post('/account/mycurrency', ['as' => 'mycurrency', 'uses' => 'AccountController@currencyUpdate']);
        

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        /*
         * User Profile Picture
         */
        Route::patch('profile-picture/update', 'ProfileController@updateProfilePicture')->name('profile-picture.update');
    });
});

/*
* Show pages
*/
Route::get('pages/{slug?}', 'FrontendController@showPage')->name('pages.show');
Route::get('contact-us', 'FrontendController@contactUs')->name('contact-us');


