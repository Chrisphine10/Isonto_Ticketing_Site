<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketToken extends Model
{
        Protected $fillable = [
         'token', 'user_id', 'event_id',
     ];
     
     protected $table='ticket_tokens'; 

}
