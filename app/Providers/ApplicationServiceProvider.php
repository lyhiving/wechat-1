<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use EasyWeChat\Foundation\Application;

class ApplicationServiceProvider extends ServiceProvider
{
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
        $this->app->singleton('EasyWeChat\Foundation\Application', function($app)
        {
            return new Application([
                'debug'   => true,
                'app_id'  => env('APP_ID'),         // AppID
                'secret'  => env('APP_SECRET'),     // AppSecret
                'token'   => env('TOKEN'),
                'log' => [
                    'level' => 'debug',
                    'file'  => 'wechat.log',
                ]
            ]);
        });
    }
}
