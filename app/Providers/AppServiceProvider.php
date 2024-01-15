<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Blade;
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
        /**$this->app->bind('path.public', function() {
             return base_path('../images');
        });*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::directive('excerpt', function ($text) {
            return "<?php echo Str::limit($text, 100); ?>";
        });
    	
        if(env('APP_SERVER') !== 'local')
        {
            URL::forceScheme('http');
        }

        // Paginator::useTailwind();
        Paginator::useBootstrap();
    }
}
