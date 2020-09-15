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
         Route::post('enquirysend', 'ProductController@EnquirySend')->name('enquirysend');
         Route::post('ordersend', 'ProductController@OrderSend')->name('ordersend');
         Route::post('copysend', 'ProductController@CopySend')->name('copysend');
         
         //----deepak-enquiry-order-----
         Route::get('enquiry-order', 'EnquiryOrderController@index')->name('enquiry-order');
         Route::get('printDetails/{stockID}', 'EnquiryOrderController@printDetails')->name('printDetails');
         Route::get('enquiries', 'EnquiryOrderController@enquiries')->name('enquiries');
         Route::get('enquiry-order/ordersPlaced', 'EnquiryOrderController@ordersPlaced')->name('ordersPlaced');
         Route::get('enquiry-order/ordersCompleted', 'EnquiryOrderController@ordersCompleted')->name('ordersCompleted');
         
         Route::post('changedate', 'EnquiryOrderController@EnquiryChangeDateTime')->name('changedate');
         Route::post('orderchangedate', 'EnquiryOrderController@OrderChangeDateTime')->name('orderchangedate');
         
         Route::post('EnquiryToOrderSend', 'EnquiryOrderController@EnquiryToOrderSend')->name('EnquiryToOrderSend');

	   
        Route::get('product_detail/{id}', 'ProductController@productDetail')->name('product-detail');
        Route::get('ajax_get_products', 'ProductController@ajax_get_products');
        Route::get('get_currency', 'ProductController@get_currency');
        

        Route::post('imageVideoRequest', 'ProductController@imageVideoRequest')->name('imageVideoRequest');

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

Route::post('contactussend', 'FrontendController@contactUsend')->name('contact-send');

Route::post('SubscriberMail', 'FrontendController@SubscriberMail')->name('subscriber-send');


