<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Diary extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getPublicDiary(int $limit_count = 5)
    {
        return $this->where('is_private', 'public')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getAuthUserDiary(int $limit_count = 5)
    {
        return $this->where('user_id', Auth::user()->id)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function users() 
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    
    public function comments()
    {
        return $this->hasMany(DiaryComment::class);
    }
    
    protected $fillable = [
        'title',
        'content',
        'photo_url',
        'is_private'
    ];
    
    
    
}
