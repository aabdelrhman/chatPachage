<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['api'] ,
    'namespace' => 'Abdelrhman\Chat\Controllers' ,
    'prefix' => 'api'
    ], function() {
    Route::post('register' , 'AuthController@register');
    Route::post('login' , 'AuthController@login');
    Route::group(['middleware' => ['auth:sanctum'] ], function() {
        Route::post('create-channel' , 'ChannelController@store');
        Route::post('delete-channel' , 'ChannelController@destroy');
        Route::post('send-message' , 'ChannelController@storeMessage');
        Route::get('cahnnel-messages/{id}' , 'messageController@messages');
        Route::get('last-message/{id}' , 'messageController@lastMessage');
        Route::get('seen-message/{id}' , 'messageController@seenMessage');
        Route::get('count-not-seen-message/{id}' , 'messageController@seenMessagesCount');
        Route::post('delete-chat' , 'ChannelController@destroy');
    });
});
