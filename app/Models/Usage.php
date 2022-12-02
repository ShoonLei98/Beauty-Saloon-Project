<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    use HasFactory;

    protected $fillable = [
        'usage_id',
        'date',
        'item',
        'price',
        'quantity',
        'description',
        'remove_status'
    ];
}
