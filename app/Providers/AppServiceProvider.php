<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //PROVA CON SINGLETON

        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '6tvmpt4thj7b9zh9',
                    'publicKey' => 'qk56cy7jn9xvhxk5',
                    'privateKey' => '69f588a2304ee32d69ad5409d79b640a'
                ]

                // BraintreeGateway gateway = new BraintreeGateway(
                //     Environment.SANDBOX,
                //     "6tvmpt4thj7b9zh9",
                //     "qk56cy7jn9xvhxk5",
                //     "69f588a2304ee32d69ad5409d79b640a"
                //   );
            );
        });
    }
}
