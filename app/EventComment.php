<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventComment extends Model
{
    protected $fillable = [
        'comment', 'user_id', 'event_id',
    ];

    protected $table='comments'; 

    public function eventcomment() {
        return $this->belongsTo('App\Event');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
}
