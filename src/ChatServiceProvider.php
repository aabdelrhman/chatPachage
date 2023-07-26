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
            __DIR__.'/nodeServer/server.js' => base_path().'/nodeServer',
            __DIR__ . '/Controllers' => app_path('Http/Controllers/vendor/Chatify'),
            __DIR__.'/nodeServer/package.json' => base_path().'/nodeServer',
            __DIR__.'/views' =>resource_path('views/vendor/chat')

        ]);
    }


    public function register(){

    }
}
