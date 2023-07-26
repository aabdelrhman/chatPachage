<?php

namespace Abdelrhman\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelUser extends Model
{
    use HasFactory;

    protected $fillable = ['channel_id' , 'user_id'];

    public function channel(){
        return $this->belongsTo(Channel::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
