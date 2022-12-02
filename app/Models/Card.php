<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'card_number',
        'from_date',
        'to_date',
        'service',
        'discount',
        'remove_status',
    ];

    // //set the services
    // public function setServiceAttribute($value)
    // {
    //     $this->attributes['service'] = json_encode($value);
    // }

    // //get the services
    // public function getServiceAttribute($value)
    // {
    //     return $this->attributes['service'] = json_decode($value);
    // }
}
