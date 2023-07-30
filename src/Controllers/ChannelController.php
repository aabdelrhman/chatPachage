<?php

namespace Abdelrhman\Chat\Controllers;

use Abdelrhman\Chat\Models\Channel;
use Abdelrhman\Chat\Requests\CreateChannelRequest;
use Abdelrhman\Chat\Services\ChannelService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChannelController extends Controller{

    private $chaneelService;

    public function __construct(ChannelService $channelService){
        $this->chaneelService = $channelService;
    }
    public function store(CreateChannelRequest $request){
        $this->chaneelService->create($request->validated());
        return view('chat::chat');
    }

    public function destroy(Request $request){
        $this->chaneelService->destroy($request->channel_id);
        return 'success';
    }


}
