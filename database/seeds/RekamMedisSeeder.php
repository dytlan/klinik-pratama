<?php

use Illuminate\Database\Seeder;

use App\Models\RekamMedis;

use Faker\Factory as Faker;

class RekamMedisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        
        for($i=0;$i<50; $i++){
            RekamMedis::create([
                'patient_id' => $faker->numberBetween(1,20),
                'dokter_id' => $faker->numberBetween(1,20),
                'pelayanan_id' => $faker->numberBetween(1,7),
                'diagnosa' => $faker->jobTitle,
                'keluhan' => $faker->realText(255),
                'anamnesis' => $faker->word,
                'tindakan' => $faker->realText(150),
                'alergi_obat' => $faker->numberBetween(0,1),
                'berat_badan' => $faker->numberBetween(40,120),
                'tinggi_badan' => $faker->numberBetween(140,210),
                'resep' => $faker->randomElement(['-','resep apa aja dah']),
                'register_pelayanan_id' => $faker->unique()->numberBetween(1,50),
                'tensi' => $faker->numberBetween(100,130) .'/'.$faker->numberBetween(30,90)
            ]);
        }
    }
}
