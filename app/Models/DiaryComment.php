<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryComment extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }
    
    protected $fillable = [
        'diary_id',
        'user_id',
        'body'
    ];
    
}
