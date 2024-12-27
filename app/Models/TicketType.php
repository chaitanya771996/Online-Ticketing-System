<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $fillable = ['event_id', 'type', 'price', 'quantity'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    
}

