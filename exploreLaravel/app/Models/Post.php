<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Enable insertion for mass assignment to title and body only
    protected $fillable = [
        'title',
        'body'
    ];

    //Enabling mass assignment to all the cloumns in the db
    protected $guarded = [];


}
