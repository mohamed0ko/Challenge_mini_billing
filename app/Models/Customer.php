<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Customer extends Model
{
    protected $connection  = 'mongodb';
    protected $collection  = 'customers';

    protected $fillable = [
        'name',
        'email',
        'SIRET',
        'created_at'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
