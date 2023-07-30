<?php

namespace Abdelrhman\Chat\Controllers;

use Abdelrhman\Chat\Models\ChannelMessage;
use Abdelrhman\Chat\Models\ChannelUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function index(){
        $users = User::where('id' , '!=' , auth()->user()->id)->get();
        return view('chat::users' , compact('users'));
    }


}
