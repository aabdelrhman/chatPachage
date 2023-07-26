<?php

use Abdelrhman\Chat\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
Route::get('test' , [ChatController::class , 'test']);
