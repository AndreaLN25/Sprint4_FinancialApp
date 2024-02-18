<?php

namespace Database\Seeders;

use App\Models\TransactionModel;
use App\Models\UserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{

        TransactionModel::factory(10)->create([
            'user_id' => UserModel::inRandomOrder()->first()->id,
        ]);

    }
}
