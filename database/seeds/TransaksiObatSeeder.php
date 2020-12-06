<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\Models\RegisterPelayanan;

class TransaksiObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $registPelayanan = RegisterPelayanan::All();

        foreach($registPelayanan as $registration){
            for($i=0; $i < $faker->numberBetween(1,5); $i++){
                $registration->transactions()->create([
                    'obat_id'       => $faker->numberBetween(1,35),
                    'quantity'      => $faker->numberBetween(1,20),
                    'apoteker_id'   => $faker->numberBetween(1,20),
                ]);
            }
        }
        
    }
}
