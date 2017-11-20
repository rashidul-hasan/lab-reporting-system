<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slots')->insert([
            'time' => '7am - 9am',
            'notes' => 'Early Morning',
            'created_at' => Carbon::now()->format(('Y-m-d H:i:s'))
        ]);

        DB::table('slots')->insert([
            'time' => '9am - 11am',
            'notes' => 'Morning',
            'created_at' => Carbon::now()->format(('Y-m-d H:i:s'))
        ]);

        DB::table('slots')->insert([
            'time' => '1pm - 3pm',
            'notes' => 'Noon',
            'created_at' => Carbon::now()->format(('Y-m-d H:i:s'))
        ]);

        DB::table('slots')->insert([
            'time' => '3pm - 5pm',
            'notes' => 'Afternoon',
            'created_at' => Carbon::now()->format(('Y-m-d H:i:s'))
        ]);
    }
}
