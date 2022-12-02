<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_invoice_id',
        'customer_name',
        'checkout_status',
    ];
}
