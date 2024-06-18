<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'transactions';
    protected $fillable = [
        'transactionNumber',
        'transactionDateTime',
        'transactionPaymentMethod',
        'amount',
        'transactionTotal',
        'transactionStatus',
        'userEmail',
        'customer_id',
        'package_id',
        'transactionAmount',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}