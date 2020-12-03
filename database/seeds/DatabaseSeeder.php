<?php

use App\Models\RegisterPelayanan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KategoriObatSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(PelayananSeeder::class);
        $this->call(JadwalPraktekSeeder::class);
        $this->call(RegisterPelayananSeeder::class);
    }
}
