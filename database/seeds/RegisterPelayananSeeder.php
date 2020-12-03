<?php

use Illuminate\Database\Seeder;

use App\Models\RegisterPelayanan;

use Faker\Factory as Faker;

class RegisterPelayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i=0; $i<50;$i++){
            RegisterPelayanan::create([
                'patient_id' => $faker->numberBetween(1,20),
                'jadwal_praktek_id' => $faker->numberBetween(1,24),
                'status' => $faker->randomElement(['resepsionis','pelayanan', 'apoteker','selesai']),
                'antrian' => $faker->unique()->numberBetween(1,50)
            ]);
        }
    }
}
