<?php

namespace Database\Factories;
use App\Models\UserModel;
use App\Models\TransactionModel;
use App\Models\SharedTransactionModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SharedTransactionModel>
 */
class SharedTransactionModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        protected $model = SharedTransactionModel::class;

        public function definition():array
        {
            $user = UserModel::factory()->create();
            $transaction = TransactionModel::factory()->create();
    
            return [
                'user_id' => UserModel::factory(),
                'transaction_id' => TransactionModel::factory(),
                'amount' => $this->faker->randomFloat(2, 0, 1000),
                'participants' => $this->faker->sentence,
                'approval_status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
                'note' => $this->faker->sentence,
            ];
    }
}


