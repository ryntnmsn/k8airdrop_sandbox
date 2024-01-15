<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Admin repositories
        $api_models = array(
            'Language',
            'Advertisement',
            'Subscription'
        );

        foreach ($api_models as $api_model) {
            $this->app->bind("App\Interfaces\Admin\\{$api_model}RepositoryInterface", "App\Repositories\Admin\\{$api_model}Repository");
        }

        foreach ($api_models as $api_model) {
            $this->app->bind("App\Interfaces\API\AdvertisementRepositoryInterface", "App\Repositories\API\AdvertisementRepository");
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
