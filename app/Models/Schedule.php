<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Schedule extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'start_date', 'end_date', 'event_name', 'user_id'
    ];
    
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getIndividualSchedule()
    {
        return $this->where('user_id', Auth::id());
    }
}
