<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('meleediamonds', 'MeleeDiamonds\MeleeDiamondsController@index')->name('meleediamonds');
Route::get('princessList', 'MeleeDiamonds\MeleeDiamondsController@princessList')->name('princessList');

Route::get('addMeleeDiamond', 'MeleeDiamonds\MeleeDiamondsController@addMeleeDiamond')->name('addMeleeDiamond');

Route::get('addMeleeDiamond/{id}/{shape}', 'MeleeDiamonds\MeleeDiamondsController@editMeleeDiamond')->name('addMeleeDiamond');

Route::post('submitMeleeDiamond', 'MeleeDiamonds\MeleeDiamondsController@submitMeleeDiamond')->name('submitMeleeDiamond');

Route::post('updateMeleeDiamond', 'MeleeDiamonds\MeleeDiamondsController@updateMeleeDiamond')->name('updateMeleeDiamond');

Route::get('deleteMeleeDiamond/{id}', 'MeleeDiamonds\MeleeDiamondsController@deleteMeleeDiamond')->name('deleteMeleeDiamond');








