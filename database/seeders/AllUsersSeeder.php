<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        UserModel::factory(10)->create();
    }
}
