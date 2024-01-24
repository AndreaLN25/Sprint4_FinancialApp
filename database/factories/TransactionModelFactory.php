<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionModel>
 */
class TransactionModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'movement_type' => $this->faker->randomElement(['income', 'expense']),
            'description' => $this->faker->sentence,
            'date' => $this->faker->date,
            'amount' => $this->faker->randomFloat(2, 0, 1000),
            'completed' => $this->faker->randomElement(['yes', 'no']),
            'category_income' => $this->faker->randomElement(['salary', 'interest', 'investment', 'rent']),
            'category_expense' => $this->faker->randomElement(['leisure', 'restaurant', 'transport', 'health', 'clothing', 'others']),
            'payment_method_income' => $this->faker->randomElement(['cash', 'transfer', 'check', 'bizum']),
            'payment_method_expense' => $this->faker->randomElement(['cash', 'transfer', 'check', 'bizum','card']),
        ];
    }
}
