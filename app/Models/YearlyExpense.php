<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearlyExpense extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_id',
        'from_date',
        'to_date',
        'expense',
        'amount',
        'description',
        'remove_status',
    ];
}
