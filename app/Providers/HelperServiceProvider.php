<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class HelperServiceProvider
 * @see http://stackoverflow.com/a/31703148
 * @package App\Providers
 */
class HelperServiceProvider extends ServiceProvider
{
    protected $helpers = [
        // Add your helpers in here
        'db_helpers',
        'url_helpers',
        'str_helpers',
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->helpers as $helper) {
            $helper_path = app_path().'/Helpers/'.$helper.'.php';

            if (\File::isFile($helper_path)) {
                require_once $helper_path;
            }
        }
    }
}
