<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/user/area/{area}', 'User\AreaController@store')->name('user.area.store');

