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

            $participants = [];
            $numberOfParticipants = $this->faker->numberBetween(1, 10);

            for ($i = 0; $i < $numberOfParticipants; $i++) {
                $participant = UserModel::factory()->create();
                $participants[] = $participant->first_name . ' ' . $participant->last_name;
            }

            $totalAmount = $this->faker->randomFloat(2, 0, 100000);

  /*           dd([
                'user_id' => UserModel::factory()->create()->id,
                'transaction_id' => TransactionModel::factory()->create()->id,
                'amount' => $totalAmount,
                'user_paid' => UserModel::factory()->create()->full_name,
                'number_of_participants' => count($participants),
                'name_of_participants' => implode(', ', $participants),
                'amount_per_participant' => $totalAmount/$numberOfParticipants,
                'date' => $this->faker->date,
                'description' => $this->faker->sentence,
                'approval_status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
                'note' => $this->faker->sentence,
            ]);
             */

            return [
                'user_id' => UserModel::factory()->create()->id,
                'transaction_id' => TransactionModel::factory()->create()->id,
                'amount' => $totalAmount,
                //'user_paid' => UserModel::all()->random()->first_name . ' ' . UserModel::all()->random()->last_name,
                //'user_paid' => UserModel::all()->random()->full_name,
                //'user_paid' => UserModel::all()->random()->id,
                //'user_paid' => UserModel::all()->random()->getFullNameAttribute(),
                'user_paid' => UserModel::factory()->create()->full_name,

                'number_of_participants' => count($participants),
                'name_of_participants' => implode(', ', $participants),
                'amount_per_participant' => $totalAmount/$numberOfParticipants,
                'date' => $this->faker->date,
                'description' => $this->faker->sentence,
                'approval_status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
                'note' => $this->faker->sentence,
            ];
    }
}


