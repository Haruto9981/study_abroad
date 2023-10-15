<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }
    
    public function diary_likes()
    {
        return $this->belongsToMany(Diary::class)->withTimestamps();
    }
    
    public function comments()
    {
        return $this->hasMany(DiaryComment::class);
    }
    
    public function expression_likes()
    {
        return $this->belongsToMany(Expression::class)->withTimestamps();
    }
    
    
    public function expressions()
    {
        return $this->hasMany(Expression::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follow_user', 'user_id', 'follow_id')->withTimestamps();
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follow_user', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
