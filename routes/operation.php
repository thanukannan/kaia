<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('operation')->user();

    //dd($users);

    return view('operation.home');
})->name('home');


Route::get('operationcategory/addclient', 'OperationController@showClient');
Route::post('operationcategory/addclient','OperationController@addClient')->name('showClient');
Route::get('operationcategory/viewclient','OperationController@viewClient');
Route::delete('operationcategory/addclient/{id}','OperationController@deleteClient')->name('destroy_client');
Route::get('operationcategory/editclient/{id}','OperationController@editClient')->name('edit_client');
Route::post('operation/editclient/{id}','OperationController@updateClient')->name('update_client');



Route::get('operationcategory/addhotel','OperationController@showHotel');
Route::post('operationcategory/addhotel','OperationController@addHotel')->name('showHotel');
Route::get('operationcategory/viewhotel','OperationController@viewHotel');
Route::delete('operationcategory/addhotel/{id}','OperationController@deleteHotel')->name('destroy_hotel');
Route::get('operationcategory/edithotel/{id}','OperationController@editHotel')->name('edit_hotel');
Route::post('operationcategory/edithotel/{id}','OperationController@updateHotel')->name('update_hotel');



Route::get('operationcategory/addbooking', 'OperationController@showBooking');
Route::post('operationcategory/addbooking','OperationController@addBooking')->name('showBooking');
Route::get('operationcategory/viewbooking','OperationController@viewBooking');
Route::delete('operationcategory/addbooking/{id}','OperationController@deleteBooking')->name('destroy_booking');
Route::get('operationcategory/editbooking/{id}','OperationController@editBooking')->name('edit_booking');
Route::post('operationcategory/editbooking/{id}','OperationController@updateBooking')->name('update_booking');


Route::get('operationcategory/demo', 'OperationController@demo');
Route::get('operationcategory/getTariffValue', 'OperationController@getTariffValue');

Route::get('booking/myPDF/{id}','AdminController@generatePDF')->name('pdf_booking');