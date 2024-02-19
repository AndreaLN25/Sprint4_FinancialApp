<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SharedTransactionModel;
use App\Models\UserModel;
use Illuminate\Database\Seeder;

class SharedTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $user = UserModel::inRandomOrder()->first();

        $numberOfRecords = 10;
        SharedTransactionModel::factory($numberOfRecords)->create([
            'user_paid' => $user->id,
        ]);

    }
}
