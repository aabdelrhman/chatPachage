<?php

use Abdelrhman\Chat\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
Route::get('chat' , function(){
    return view('chat.chat');
});
