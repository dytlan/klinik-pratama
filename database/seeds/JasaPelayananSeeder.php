<?php

use Illuminate\Database\Seeder;

use App\Models\Pelayanan;

class JasaPelayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service1 = Pelayanan::FindOrFail(1);
        $service1->costs()->attach([1,2,3,4,7,13,15,16,18,19,21]);

        $service2 = Pelayanan::FindOrFail(2);
        $service2->costs()->attach([10,11,12,13,16,17,18,19]);

        $service3 = Pelayanan::FindOrFail(3);
        $service3->costs()->attach([2,5,6,7,8,13]);

        $service4 = Pelayanan::FindOrFail(4);
        $service4->costs()->attach([1,2,9,13,15,16,18,19]);

        $service5 = Pelayanan::FindOrFail(5);
        $service5->costs()->attach([13,16,17,18,19]);

        $service6 = Pelayanan::FindOrFail(6);
        $service6->costs()->attach(20);

        $service7 = Pelayanan::FindOrFail(7);
        $service7->costs()->attach([13,14]);
    }
}
