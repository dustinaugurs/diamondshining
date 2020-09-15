<?php
/**
 * Order
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'OrderManagement'], function () {
        Route::resource('orders', 'OrdersController');
        //For Datatable
        Route::post('orders/get', 'OrdersTableController')->name('orders.get');
        Route::get('cusorders', 'OrdersTableController@getjsondata')->name('cusorders');

        Route::post('adOrderStatusAndPaymentUpdate', 'OrdersController@OrderStatusAndPaymentUpdate')->name('adOrderStatusAndPaymentUpdate');
        Route::get('addateAndPaymentFilter', 'OrdersController@dateAndPaymentFilter')->name('addateAndPaymentFilter');
        Route::get('adprintDetails/{stockID}', 'OrdersController@printDetails')->name('adprintDetails');
        
        Route::get('enquiriesIndex', 'OrdersController@enquiriesIndex')->name('enquiriesIndex');
        Route::post('enqadOrderStatusAndPaymentUpdate', 'OrdersController@EnqOrderStatusAndPaymentUpdate')->name('enqadOrderStatusAndPaymentUpdate');
        Route::get('enqaddateAndPaymentFilter', 'OrdersController@EnqdateAndPaymentFilter')->name('enqaddateAndPaymentFilter');

        Route::get('notificationOrders', 'OrdersController@notificationOrders')->name('notificationOrders');
        Route::get('notificationEnquiries', 'OrdersController@notificationEnquiries')->name('notificationEnquiries');
        Route::post('notificationUpdate', 'OrdersController@notificationUpdate')->name('notificationUpdate');

        Route::get('requestForImage', 'OrdersController@requestForImage')->name('requestForImage');
        Route::get('requestForVideo', 'OrdersController@requestForVideo')->name('requestForVideo');
        Route::get('requestForPdf', 'OrdersController@requestForPdf')->name('requestForPdf');
       
        Route::get('requestEditForm/{productID}/{orderStatus}', 'OrdersController@requestEditForm')->name('requestEditForm');

        Route::GET('updateReq', 'OrdersController@updateReq')->name('updateReq');

        Route::get('generateInvoicePDF', 'OrdersController@generateInvoicePDF')->name('generateInvoicePDF');

        
        
    });
    
});