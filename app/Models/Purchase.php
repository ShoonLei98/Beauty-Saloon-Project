<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
      'purchase_id',
      'voucher',
      'date',
      'item',
      'price',
      'counter',
      'counter_name',
      'quantity',
      'discount',
      'cash_percent',
      'tax',
      'sub_total',
      'total',
      'remove_status',
    ];
}
