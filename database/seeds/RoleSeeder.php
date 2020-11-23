<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'nama' => 'admin'
        ]);

        Role::create([
            'nama' => 'resepsionis'
        ]);

        Role::create([
            'nama' => 'dokter'
        ]);

        Role::create([
            'nama' => 'apoteker'
        ]);
    }
}
