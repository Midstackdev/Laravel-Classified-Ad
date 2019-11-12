<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/user/area/{area}', 'User\AreaController@store')->name('user.area.store');

Route::group(['prefix' => '/{area}'], function() {
    
    /**
    * Category
    */
    Route::group(['prefix' => '/categories'], function() {
        Route::get('/', 'Category\CategoryController@index')->name('category.index');

        Route::group(['prefix' => '/{category}'], function() {
            Route::get('/listing', 'Listing\ListingController@index')->name('listing.index');
        });
    });

});

