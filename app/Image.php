<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   Protected $fillable = [
    'image_url',
];

protected $table='images'; 
}
