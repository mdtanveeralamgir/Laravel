<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'path'];

    public static function scopeTest($query)
    {
        return $query->orderBy('id', 'desc')->get();
        // return $query->latest()->get();
    }

    //accessor
    public function getPathAttribute($path)
    {
        return 'images/' . $path;
    }
}
