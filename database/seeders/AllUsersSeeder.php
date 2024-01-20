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
    public function run(): void
    {
        //
        UserModel::create([
            'first_name' => 'Ana', 
            'last_name' => 'Mendez', 
            'mailadress'=> 'anamendez@gmail.com',
            'password' => bcrypt('password456'),
        ]);

    }
}
