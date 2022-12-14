<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleVoucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucher_id',
        'voucher_code',
        'date',
        'tax',
        'total',
        'remove_status',
    ];
}
