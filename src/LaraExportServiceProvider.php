<?php

namespace LaraExport;

use Illuminate\Support\ServiceProvider;

class LaraExportServiceProvider extends ServiceProvider
{
    protected $defer = true;


    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind('laraexport', function(){
            return new Export();
        });
    }

    public function provides()
    {
        return array('laraexport');
    }
}