<?php

use Illuminate\Database\Seeder;

use App\Models\User;

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

        $users = User::where('role_id', 3)->get();

        foreach($users as $user){
            for($i=0 ; $i < 10; $i++){
                $user->schedules()->create([
                    'nama' => $faker->jobTitle,
                    'hari' => $faker->randomElement(['senin', 'selasa', 'rabu', 'kamis', 'jum\'at', 'sabtu', 'minggu']),
                    'mulai' => $faker->time(),
                    'sampai' => $faker->time(),
                    'ruangan' => $faker->companySuffix,
                ]);
            }
        }
    }
}
