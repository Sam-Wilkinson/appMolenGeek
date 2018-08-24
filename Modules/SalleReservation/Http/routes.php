<?php

Route::group(['middleware' => 'web', 'prefix' => 'sallereservation', 'namespace' => 'Modules\SalleReservation\Http\Controllers'], function()
{
    Route::resource('/calendar', 'SalleReservationController');
    Route::resource('/rooms','RoomController');
});
