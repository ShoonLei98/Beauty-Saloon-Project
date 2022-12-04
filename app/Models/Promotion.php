<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'promo_id',
        'promo_name',
        'item',
        'from_date',
        'to_date',
        'promo_type',
        'discount_value',
        'discount',
        'counter_discount',
        'shop_discount',
        'remove_status',
    ];
}
