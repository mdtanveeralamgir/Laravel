<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded= [];
    protected $appends = ['post_image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //setting up mutator (change data before inserting into db)
    // for post_image column in posts table
//    public function setPostImageAttribute($value)
//    {
//        $this->attributes['post_image'] = asset($value);
//    }

    //setting up accessor (change data after fetching from db)
    // for post_image column in posts table
    public function getPostImageAttribute($value)
        {
            if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE)
                {
                return $value;
                }
            return asset('storage/' . $value);
        }
}
