<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('reportdetails', 'ReportManagement\ReportManagementController@index')->name('reportdetails');
Route::get('reportdetails/{supplier_name}', 'ReportManagement\ReportManagementController@dataSupplierWise')->name('reportdetails');

Route::get('PdfDownload/{supplier_name}', 'ReportManagement\ReportManagementController@PdfDownload')->name('reportdetails');







