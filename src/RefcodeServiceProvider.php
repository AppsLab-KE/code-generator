<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/21/19
 * Time: 6:59 AM
 */

namespace Unique\Refcode;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Unique\Refcode\Console\RefcodeCommand;

class RefcodeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()){
            $this->registerPublishing();
        }

        $this->registerResources();
    }


    public function register()
    {
        $this->commands([
            RefcodeCommand::class,
        ]);
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views','refcode');

        $this->registerFacades();
        $this->registerRoutes();
        $this->registerTypes();
    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../config/refcode.php' => config_path('refcode.php')
        ],'refcode-config');
    }

    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function (){
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            'prefix' => \Unique\Refcode\Facades\Refcode::path(),
            'namespace' => 'Unique\Refcode\Http\Controllers'
        ];
    }

    protected function registerFacades()
    {
        $this->app->singleton('Refcode', function ($app){
            return new \Unique\Refcode\Refcode();
        });
    }

    private function registerTypes()
    {
        \Unique\Refcode\Facades\Refcode::types([
            Refcode\ReferenceTypes\Alphabet::class,
            Refcode\ReferenceTypes\Alphanumeric::class,
            Refcode\ReferenceTypes\Numeric::class,
            Refcode\ReferenceTypes\Key::class,
        ]);
    }

}