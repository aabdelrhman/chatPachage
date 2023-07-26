<?php
namespace Abdelrhman\Chat\Services;
use Abdelrhman\Chat\Models\Channel;
use Abdelrhman\Chat\Models\ChannelMessage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MessageService extends BaseClass{

    public function getMessages($id){
        return ChannelMessage::where('channel_id' , $id);
    }


    public function messagesNotSeen($channel_id){
        return $this->getMessages($channel_id)->whereNull('read_at');
    }
    public function create($data){
        $data['sender_id'] = Auth::user()->id;
        ChannelMessage::create($data);
    }

    public function destroy($message_id){
        $message = $this->findById(new ChannelMessage , $message_id);
        $message->delete();
    }

    public function getMessageBychannel($channel_id){
        $messages = $this->getMessages($channel_id)
        ->orderBy('id' , $this->sortType())
        ->paginate(BaseClass::PAGINATION);
        return $messages;
    }

    public function getLastmessage($channel_id){
        return $this->getMessages($channel_id)->orderBy('id' , 'DESC')->first();
    }

    public function makeMessagesSeen($channel_id){
        $messagesNotSeen = $this->messagesNotSeen($channel_id);
        $messagesNotSeen->update([
            'read_at' => Carbon::now(),
        ]);

    }

    public function countMessagesNotSeen($channel_id){
        return $this->messagesNotSeen($channel_id)->count();
    }
}
