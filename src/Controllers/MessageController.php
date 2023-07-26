<?php

namespace Abdelrhman\Chat\Controllers;

use Abdelrhman\Chat\Requests\StoreMessageRequest;
use Abdelrhman\Chat\Services\MessageService;
use App\Http\Controllers\Controller;

class messageController extends Controller{

    private $messageService;

    public function __construct(MessageService $messageService){
        $this->messageService = $messageService;
    }
    public function store(StoreMessageRequest $request){
        $this->messageService->create($request->validated());
        return 'success';
    }

    public function messages($channel_id){
        return $this->messageService->getMessageBychannel($channel_id);
    }

    public function lastMessage($channel_id){
        return $this->messageService->getLastmessage($channel_id);
    }

    public function seenMessage($channel_id){
        $this->messageService->makeMessagesSeen($channel_id);
        return 'success';
    }

    public function seenMessagesCount($channel_id){
        return $this->messageService->countMessagesNotSeen($channel_id);
    }


}
