<?php

use Illuminate\Support\Facades\Route;
    Route::middleware('web','auth')->group(function () {
        Route::get('users' , 'Abdelrhman\Chat\Controllers\UserController@index');
        Route::post('create-channel' , 'Abdelrhman\Chat\Controllers\ChannelController@store')->name('create-channel');
        Route::get('chat/{id}' , 'Abdelrhman\Chat\Controllers\MessageController@messages');
    });

