<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'mohamed',
            'email' => 'mohamed@gamil.com',
            'SIRET' => 'CDI1234556789',
            'created_at' => '2024-01-01'
        ]);
    }
}
