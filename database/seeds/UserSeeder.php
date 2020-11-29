<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Faker\Factory as Faker;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 0; $i<20; $i++){
            User::create([
                'nama' => $faker->name,
                'username' => $faker->unique()->userName,
                'role_id' => $faker->numberBetween(1,4),
                'str' => $faker->randomDigit,
                'password' => Hash::make('1234567890'),
                'masa_berlaku' => $faker->date()
            ]);
        }
    }
}
