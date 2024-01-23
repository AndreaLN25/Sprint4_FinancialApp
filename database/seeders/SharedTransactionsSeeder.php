<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SharedTransactionModel;
use Illuminate\Database\Seeder;

class SharedTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $numberOfRecords = 10;
        SharedTransactionModel::factory($numberOfRecords)->create();
    
    }
}
