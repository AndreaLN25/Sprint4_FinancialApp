<?php

namespace Database\Seeders;

use App\Models\TransactionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransactionModel::create([
            'movement_type' => 'income',
            'description' => 'Salary',
            'date' => now(),
            'amount' => 45000,
            'completed' => 'yes',
            'category_income' => 'salary',
            'category_expense' => null,
            'payment_method_income' => 'transfer',
            'payment_method_expense' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        TransactionModel::create([
            'movement_type' => 'expense',
            'description' => 'Dinner',
            'date' => now(),
            'amount' => 30,
            'completed' => 'yes',
            'category_income' => null,
            'category_expense' => 'restaurant',
            'payment_method_income' => null,
            'payment_method_expense' => 'card',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
