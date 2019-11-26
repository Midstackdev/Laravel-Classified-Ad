<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/user/area/{area}', 'User\AreaController@store')->name('user.area.store');

Route::get('/braintree/token', 'BraintreeController@token');


Route::group(['prefix' => '/{area}'], function() {
    
    /**
    * Category
    */
    Route::group(['prefix' => '/categories'], function() {
        Route::get('/', 'Category\CategoryController@index')->name('category.index');

        Route::group(['prefix' => '/{category}'], function() {
            Route::get('/listings', 'Listing\ListingController@index')->name('listing.index');
        });
    });

    /**
    * Listing
    */
    Route::group(['prefix' => '/listings', 'namespace' => 'Listing'], function() {
        Route::get('/favourites', 'ListingFavouriteController@index')->name('listings.favourites.index');
        Route::post('/{listing}/favourites', 'ListingFavouriteController@store')->name('listings.favourites.store');
        Route::delete('/{listing}/favourites', 'ListingFavouriteController@destroy')->name('listings.favourites.destroy');

        Route::get('/viewed', 'ListingViewedController@index')->name('listing.viewed.index');
        
        Route::post('/{listing}/contact', 'ListingContactController@store')->name('listing.contact.store');

        Route::get('/{listing}/payment', 'ListingPaymentController@show')->name('listing.payment.show');
        Route::post('/{listing}/payment', 'ListingPaymentController@store')->name('listing.payment.store');

        Route::group(['middleware' => 'auth'], function() {
            Route::get('/create', 'ListingController@create')->name('listings.create');
            Route::post('/', 'ListingController@store')->name('listings.store');

            Route::get('/{listing}/edit', 'ListingController@edit')->name('listings.edit');
            Route::patch('/{listing}', 'ListingController@update')->name('listings.update');
        });
    });

    Route::get('/{listing}', 'Listing\ListingController@show')->name('listing.show');

});


 