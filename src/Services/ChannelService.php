<?php
namespace Abdelrhman\Chat\Services;
use Abdelrhman\Chat\Models\Channel;

class ChannelService extends BaseClass{
    public function create($data){
        Channel::create()->users()->createMany($data['users']);
    }

    public function destroy($channel_id){
        $channel = $this->findById(new Channel , $channel_id);
        $channel->delete();
    }
}
