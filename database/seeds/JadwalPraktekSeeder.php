<?php

use Illuminate\Database\Seeder;

use App\Models\Pelayanan;

use Faker\Factory as Faker;

class JadwalPraktekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $services = Pelayanan::all();

        foreach($services as $service){
            for($i=0 ; $i < 5; $i++){
                $service->schedules()->create([
                    'hari' => $faker->randomElement(['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu']),
                    'mulai' => $faker->time(),
                    'sampai' => $faker->time(),
                    'ruangan' => $faker->companySuffix,
                    'user_id' => $faker->numberBetween(1,20)
                ]);
            }
        }
    }
}
