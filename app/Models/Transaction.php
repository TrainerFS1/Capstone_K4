<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'transaction_no',
        'user_id',
        'customer_id',
        'package_id',
        'amount',
        'status',
        'total_payment',
    ];
}
