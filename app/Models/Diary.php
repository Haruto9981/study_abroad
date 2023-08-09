<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diary extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getPaginateByLimit (int $limit_count = 2)
    {
        return $this->where('is_private', 1)->orderBy('updated_at', 'DESC')->paginate($limit_count, ['*'], 'page1');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function users() 
    {
        return $this->belongsToMany(User::class);
    }
    
    protected $fillable = [
        'title',
        'content',
        'photo',
        'is_private'
    ];
    
    
    
}
