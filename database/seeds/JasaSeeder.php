<?php

use Illuminate\Database\Seeder;

use App\Models\Jasa;

class JasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jasa::create([
            'nama'          => 'pemeriksaan kehamilan',
            'biaya'         => '40000',
        ]);
        
        Jasa::create([
            'nama'          => 'pemeriksaan ginekologi',
            'biaya'         => '40000',
        ]);

        Jasa::create([
            'nama'          => 'persalinan spontan',
            'biaya'         => '1300000',
        ]);

        Jasa::create([
            'nama'          => 'persalinan kelas 1',
            'biaya'         => '1800000',
        ]);

        Jasa::create([
            'nama'          => 'suntik kb (cyclofem)',
            'biaya'         => '30000',
        ]);

        Jasa::create([
            'nama'          => 'suntik kb (depo)',
            'biaya'         => '20000',
        ]);

        Jasa::create([
            'nama'          => 'pemasangan IUD',
            'biaya'         => '250000',
        ]);

        Jasa::create([
            'nama'          => 'pemasangan implant',
            'biaya'         => '250000',
        ]);

        Jasa::create([
            'nama'          => 'imunisasi ibu hamil',
            'biaya'         => '50000',
        ]);

        Jasa::create([
            'nama'          => 'imunisasi bayi',
            'biaya'         => '50000',
        ]);

        Jasa::create([
            'nama'          => 'suntik vitamin k (bayi)',
            'biaya'         => '30000',
        ]);

        Jasa::create([
            'nama'          => 'pemeriksaan bayi & balita',
            'biaya'         => '30000',
        ]);

        Jasa::create([
            'nama'          => 'jasa dokter',
            'biaya'         => '50000',
        ]);

        Jasa::create([
            'nama'          => 'pemeriksaan gigi',
            'biaya'         => '30000',
        ]);

        Jasa::create([
            'nama'          => 'pemeriksaan USG',
            'biaya'         => '80000',
        ]);

        Jasa::create([
            'nama'          => 'pemeriksaan HB',
            'biaya'         => '25000',
        ]);

        Jasa::create([
            'nama'          => 'pemeriksaan golongan darah',
            'biaya'         => '20000',
        ]);

        Jasa::create([
            'nama'          => 'pemeriksaan glukosa dan protein urine',
            'biaya'         => '40000',
        ]);

        Jasa::create([
            'nama'          => 'pemeriksaan kolesterol',
            'biaya'         => '50000',
        ]);

        Jasa::create([
            'nama'          => 'Massage baby',
            'biaya'         => '40000',
        ]);

        Jasa::create([
            'nama'          => 'laundry',
            'biaya'         => '50000',
        ]);
    }
}
