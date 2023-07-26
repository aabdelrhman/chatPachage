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
            __DIR__.'/chatServer.js' => base_path().'/server.js',
            __DIR__.'/routes' => base_path().'/routes/chat',
            __DIR__.'/Controllers' => base_path().'/app/Http/Controllers/chat',
            __DIR__.'/Requests' => base_path().'/app/Http/Requests/chat',
            __DIR__.'/views' => base_path().'/resources/views/chat',
            __DIR__.'/Models' => base_path().'/app/Models/chat',

        ]);
    }


    public function register(){

    }
}
