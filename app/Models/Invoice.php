<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Invoice extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'invoices';

    protected $fillable = [
        'customer_id',
        'date',
        'lines',
        'total_ht',
        'total_tva',
        'total_ttc'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
