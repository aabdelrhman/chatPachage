<?php

namespace Abdelrhman\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelMessage extends Model
{
    use HasFactory;
    protected $fillable = ['channel_id'  , 'type' , 'message' , 'sender_id' ,  'read_at'];


    public function sender(){
        return $this->belongsTo(User::class , 'sender_id' , 'id');
    }

    public function channel(){
        return $this->belongsTo(Channel::class);
    }
}
