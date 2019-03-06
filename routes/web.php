<?php


Route::get('/', function () {
    return redirect('/contact-us');
});

Route::get('/contact-us', 'ContactUsController@show');
Route::post('/contact-us', 'ContactUsController@store');
