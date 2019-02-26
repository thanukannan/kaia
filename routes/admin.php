<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

Route::get('booking/addbooking', 'AdminController@showBooking');
Route::post('booking/addbooking','AdminController@addBooking')->name('showBooking');
Route::get('booking/viewbooking','AdminController@viewBooking');
Route::delete('booking/addbooking/{id}','AdminController@deleteBooking')->name('destroy_booking');
Route::get('booking/editbooking/{id}','AdminController@editBooking')->name('edit_booking');
Route::post('booking/editbooking/{id}','AdminController@updateBooking')->name('update_booking');
Route::get('booking/invoice/{id}','AdminController@generate_invoice')->name('generate_pdf');


Route::get('booking/addclient', 'AdminController@showClient');
Route::post('booking/addclient','AdminController@addClient')->name('showClient');
Route::get('booking/viewclient','AdminController@viewClient');
Route::delete('booking/addclient/{id}','AdminController@deleteClient')->name('destroy_client');
Route::get('booking/editclient/{id}','AdminController@editClient')->name('edit_client');
Route::post('booking/editclient/{id}','AdminController@updateClient')->name('update_client');


Route::get('booking/addhotel','AdminController@showHotel');
Route::post('booking/addhotel','AdminController@addHotel')->name('showHotel');
Route::get('booking/viewhotel','AdminController@viewHotel');
Route::delete('booking/addhotel/{id}','AdminController@deleteHotel')->name('destroy_hotel');
Route::get('booking/edithotel/{id}','AdminController@editHotel')->name('edit_hotel');
Route::post('booking/edithotel/{id}','AdminController@updateHotel')->name('update_hotel');


Route::get('booking/addstaff', 'AdminController@showStaff');
Route::post('booking/addstaff','AdminController@addStaff')->name('showStaff');
Route::get('booking/viewstaff','AdminController@viewStaff');
Route::delete('booking/addstaff/{id}','AdminController@deleteStaff')->name('destroy_staff');
Route::get('booking/editstaff/{id}','AdminController@editStaff')->name('edit_staff');
Route::post('booking/editstaff/{id}','AdminController@updateStaff')->name('update_staff');



// PAYMENTS
Route::get('booking/addpayment', 'AdminController@showPayment');
Route::post('booking/AddPaymentAdmin', 'paymentController@AddPaymentAdmin')->name('AddPaymentAdmin');
Route::get('/payment/viewPayment', 'paymentController@viewAdminPayment');




Route::get('booking/get_hotel_data', 'AdminController@get_hotel_data');
Route::get('booking/getTariffValue', 'AdminController@getTariffValue');

Route::post('booking/addpayment', 'AdminController@add_kaia_income');


Route::get('booking/get_income_data', 'AdminController@get_income_data');


Route::get('report/viewreport','AdminController@export');


Route::get('booking/report','AdminController@viewReport');
