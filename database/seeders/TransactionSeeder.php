<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Transaction::create([
            'user_id' => 1,
            'certif_id' => 1,
            'payment_code' => "Testing Code",
            'transaction_proof' => 'luca.png',
        ]);
    }
}
