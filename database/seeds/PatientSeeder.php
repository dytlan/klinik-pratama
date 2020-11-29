<?php

use Illuminate\Database\Seeder;

use App\Models\Patient;

use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=0; $i<20; $i++){
            Patient::create([
                'nama'          => $faker->name,
                'jk'            => $faker->randomElement(['laki-laki','perempuan']),
                'no_hp'         => $faker->numberBetween(1000000000,100000000000000),
                'alamat'        => $faker->address,
                'nik'           => $faker->nik,
                'tempat_lahir'  => $faker->country,
                'tanggal_lahir' => $faker->date(),
                'pekerjaan'     => $faker->jobTitle,
                'pendidikan'    => $faker->title,
            ]);
        }
    }
}
