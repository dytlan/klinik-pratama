<?php

use Illuminate\Database\Seeder;

use App\Models\Pelayanan;

class PelayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelayanan::create([
            'nama' => 'Kunjungan Persalinan'
        ]);

        Pelayanan::create([
            'nama' => 'Kunjungan Bayi/Imunisasi'
        ]);

        Pelayanan::create([
            'nama' => 'Kunjungan KB' 
        ]);

        Pelayanan::create([
            'nama' => 'Resiko Tinggi Ibu Hamil' 
        ]);

        Pelayanan::create([
            'nama' => 'Pelayanan Dokter Umum' 
        ]);

        Pelayanan::create([
            'nama' => 'Kunjungan SPA' 
        ]);

        Pelayanan::create([
            'nama' => 'Pelayanan Dokter Gigi' 
        ]);
    }
}
