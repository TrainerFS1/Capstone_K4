<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'transactionNumber',
        'transactionDateTime',
        'transactionPaymentMethod',
        'transactionTotalAmount',
        'transactionStatus',
        'userEmail',
        'customer_id',
        'package_id',
    ];
}
