<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expression extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getPaginateByLimit (int $limit_count = 4)
    {
        return $this->where('is_private', 'public')->orderBy('updated_at', 'DESC')->paginate($limit_count, ['*'], 'page2');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function users() 
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    
    protected $fillable = [
        'vocabulary',
        'meaning',
        'example',
        'is_private',
    ];

}