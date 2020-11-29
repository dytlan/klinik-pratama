<?php

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
    }
}
