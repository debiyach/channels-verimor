<?php

namespace NotificationChannels\Verimor;

use Illuminate\Support\ServiceProvider;

class VerimorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/verimor-notification-channel.php', 'verimor-notification-channel');

        $this->publishes([
            __DIR__.'/../config/verimor-notification-channel.php' => config_path('verimor-notification-channel.php'),
        ]);

        $this->app->singleton(VerimorSmsChannel::class, function (){
            return new VerimorSmsChannel(new VerimorSmsClient());
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
