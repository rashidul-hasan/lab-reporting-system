<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $gender = ['male','female'];

        foreach (range(1,10) as $index) {
	        DB::table('patients')->insert([
	            'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
	            'age' => $faker->numberBetween($min = 19, $max = 66),
	            'gender' => $faker->randomElement($gender),
	            'phone_number' => $faker->phoneNumber,
	            'address' => $faker->address,
	            'notes' => $faker->text($maxNbChars = 200) ,
	            'created_at' => Carbon::now()->format(('Y-m-d H:i:s'))
	        ]);
        }

    }
}
