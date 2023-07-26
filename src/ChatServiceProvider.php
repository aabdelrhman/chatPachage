<?php

namespace Abdelrhman\Chat;

use Illuminate\Support\ServiceProvider;

class ChatServiceProvider extends ServiceProvider{
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadViewsFrom(__DIR__.'/views' , 'chat');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__.'/chatServer.js' => base_path().'/server.js'

        ]);
    }


    public function register(){

    }
}
