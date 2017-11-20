<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PatientsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SlotsTableSeeder::class);
        $this->call(TestsTableSeeder::class);
        $this->call(FieldsTableSeeder::class);
        $this->call(SentinelUserSeeder::class);
    }
}
