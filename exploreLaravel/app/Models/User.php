<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
        'username',
        'avatar',
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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function userHasRole(...$roleName)
    {
        foreach ($this->roles as $role)
        {
            if(in_array($role->name, $roleName))
                return true;
        }
        return false;
    }

//    public function getAavatarAttribute($value)
//    {
//        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE)
//        {
//            return $value;
//        }
//        return asset('storage/' . $value);
//    }

    //accessor for avatar
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function ($value)
            {
                if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE)
                {
                    return $value;
                }
                return asset('storage/' . $value);
            }
        );
    }
}
