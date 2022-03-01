<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Enable insertion for mass assignment to title and body only
    protected $fillable = [
        'title',
        'body'
    ];

    //Enabling mass assignment to all the cloumns in the db
    protected $guarded = [];

    protected $dates = ['deleted_at'];


}
