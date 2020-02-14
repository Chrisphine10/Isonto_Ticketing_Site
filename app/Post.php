<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'church_id', 'image_url',
    ];

    protected $table='posts'; 
}
