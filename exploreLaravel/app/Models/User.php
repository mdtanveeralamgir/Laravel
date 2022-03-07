<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('created_at');
    }

    public function photo()
    {
        return $this->morphOne(Photo::class, 'imageable');
    }

    public function latestPhoto()
    {
        return $this->morphOne(Photo::class, 'imageable')->latestOfMany();
    }

    public function oldestPhoto()
    {
        return $this->morphOne(Photo::class, 'imageable')->oldestOfMany();
    }

    public function comment()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
