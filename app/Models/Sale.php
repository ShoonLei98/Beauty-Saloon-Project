<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'voucher_id',
        'item',
        'price',
        'quantity',
        'discount',
        'cash_percent',
        'sub_total',
        'remove_status',
      ];
}
