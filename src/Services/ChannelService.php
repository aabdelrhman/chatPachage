<?php
namespace Abdelrhman\Chat\Services;
use Abdelrhman\Chat\Models\Channel;
use Illuminate\Support\Facades\Auth;

class ChannelService extends BaseClass{
    public function create($data){
        array_push($data['users'] , ['user_id' => Auth::user()->id]);
        Channel::create()->users()->createMany($data['users']);
    }

    public function destroy($channel_id){
        $channel = $this->findById(new Channel , $channel_id);
        $channel->delete();
    }
}
