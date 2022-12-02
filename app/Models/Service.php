<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable =[
        'service_id',
        'service_name',
        'price',
        'discount',
        'from_date',
        'to_date',
        'percentage',
        'name_percentage',
        'remove_status'
    ];
}
