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
                'who_paid' => $user->id,
                'number_of_participants' => $this->faker->numberBetween(1, 1000),
                'name_of_participants' => UserModel::factory()->create()->first_name. ' ' . UserModel::factory()->create()->last_name,
                'amount_per_participant' =>  $this->faker->randomFloat(2, 0, 1000) / $this->faker->numberBetween(1, 1000),
                'date' => $this->faker->date,
                'description' => $this->faker->sentence,
                'approval_status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
                'note' => $this->faker->sentence,
            ];
    }
}


