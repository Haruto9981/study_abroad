<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function conversation() {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }
    
    public function getMessage() {
        
        return $this->orderBy('created_at', 'asc')->get();
    }
}
