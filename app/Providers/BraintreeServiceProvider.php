<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BraintreeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Braintree_Configuration::environment(config('services.braintree.environment'));
        \Braintree_Configuration::merchantId(config('services.braintree.merchant'));
        \Braintree_Configuration::publicKey(config('services.braintree.key'));
        \Braintree_Configuration::privateKey(config('services.braintree.secret'));
    }
}
