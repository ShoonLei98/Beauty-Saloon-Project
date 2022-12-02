<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
     protected $fillable =[
        'customer_id',
        'customer_name',
        'phone',
        'address',
        'card',
      //   'from_date',
      //   'to_date',
      //   'service',
      //   'discount',
        'remove_status'
     ];
}
