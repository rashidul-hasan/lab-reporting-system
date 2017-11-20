<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'slug' => 'admin',
            'name' => 'Admin'
        ]);

        DB::table('roles')->insert([
            'slug' => 'laboratorist',
            'name' => 'Laboratorist'
        ]);

        // DB::table('roles')->insert([
        //     'slug' => 'accountant',
        //     'name' => 'Accountant'
        // ]);

        DB::table('roles')->insert([
            'slug' => 'patient',
            'name' => 'Patient'
        ]);
    }
}
