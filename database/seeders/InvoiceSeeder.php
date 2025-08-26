<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::all();
        foreach ($customers as $customer) {
            Invoice::create([
                'customer_id' => $customer->_id,
                'date' => now(),
                'lines' => [
                    [
                        'description' => 'Produit A',
                        'quantity' => 2,
                        'unit_price' => 100,
                        'tva_rate' => 20
                    ],
                    [
                        'description' => 'Produit B',
                        'quantity' => 1,
                        'unit_price' => 50,
                        'tva_rate' => 10
                    ]
                ]

            ]);
        }
    }
}
