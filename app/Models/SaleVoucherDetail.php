<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleVoucherDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'v_detail_id',
        'voucher_code',
        'date',
        'item',
        'price',
        'quantity',
        'promotion',
        'sub_total',
        'remove_status'
    ];
}
