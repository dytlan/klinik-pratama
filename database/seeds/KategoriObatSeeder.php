<?php

use Illuminate\Database\Seeder;

use App\Models\KategoriObat;

use Faker\Factory as Faker;

class KategoriObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $categories = ['kb', 'demam', 'gigi', 'vitamin', 'penyakit dalam'];

        foreach($categories as $category){
            $categoryMed = KategoriObat::create([
                'kategori' => $category
            ]);

            for($i = 0; $i< 7;$i++){
                $categoryMed->medicines()->create([
                    'nama'              => $faker->company,
                    'kandungan'         => $faker->realText,
                    'harga'             => $faker->numberBetween(1000,5000000),
                    'jumlah'            => $faker->numberBetween(0,500),
                ]);
            }
        }
    }
}
