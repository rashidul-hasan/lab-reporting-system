<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->insert([
            'name' => 'Complete Blood Count',
            'code' => 'BL101',
            'description' => 'Complete Blood Count',
            'cost' => '450.00',
            'slot' => serialize(['1', '2']),
            'created_at' => Carbon::now()->format(('Y-m-d H:i:s'))
        ]);

        DB::table('tests')->insert([
            'name' => 'WBC Differential',
            'code' => 'BL102',
            'description' => 'WBC Differential',
            'cost' => '950.00',
            'slot' => serialize(['3', '4']),
            'created_at' => Carbon::now()->format(('Y-m-d H:i:s'))
        ]);

        DB::table('tests')->insert([
            'name' => 'Urine Creatinine',
            'code' => 'UR101',
            'description' => 'Urine Creatinine',
            'cost' => '500.00',
            'slot' => serialize(['1', '3']),
            'created_at' => Carbon::now()->format(('Y-m-d H:i:s'))
        ]);

        DB::table('tests')->insert([
            'name' => 'Components of Urine',
            'code' => 'UR102',
            'description' => 'Components of Urine',
            'cost' => '1500.00',
            'slot' => serialize(['1', '4']),
            'created_at' => Carbon::now()->format(('Y-m-d H:i:s'))
        ]);

        DB::table('tests')->insert([
            'name' => 'Microscopic analysis of Urine',
            'code' => 'UR103',
            'description' => 'Microscopic analysis of Urine',
            'cost' => '2500.00',
            'slot' => serialize(['1', '2', '4']),
            'created_at' => Carbon::now()->format(('Y-m-d H:i:s'))
        ]);


    }
}
