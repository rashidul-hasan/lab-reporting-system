<?php

//https://codeclimate.com/github/AsgardCms/User/Database/Seeders/SentinelUserSeedTableSeeder.php

use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SentinelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Create an admin user
        $user = Sentinel::create(
            [
                'email' => 'admin@email.com',
                'password' => '12345',
                'first_name' => 'Rashidul',
                'last_name' => 'Hasan',
            ]
        );
        // Activate the admin directly
        $activation = Activation::create($user);
        Activation::complete($user, $activation->code);

        // Find the group using the group id
        $adminGroup = Sentinel::findRoleBySlug('admin');

        // Assign the group to the user
        $adminGroup->users()->attach($user);

        // laboratorist
        $lab = Sentinel::create(
            [
                'email' => 'lab@email.com',
                'password' => '12345',
                'first_name' => 'John',
                'last_name' => 'Doe',
            ]
        );
        // Activate the admin directly
        $activation = Activation::create($lab);
        Activation::complete($lab, $activation->code);

        // Find the group using the group id
        $labGroup = Sentinel::findRoleBySlug('laboratorist');

        // Assign the group to the user
        $labGroup->users()->attach($lab);

        // patient
        $patient = Sentinel::create(
            [
                'email' => 'patient@email.com',
                'password' => '12345',
                'first_name' => 'Matt',
                'last_name' => 'Damon',
            ]
        );
        // Activate the admin directly
        $activation = Activation::create($patient);
        Activation::complete($patient, $activation->code);

        // Find the group using the group id
        $patientGroup = Sentinel::findRoleBySlug('patient');

        // Assign the group to the user
        $patientGroup->users()->attach($patient);

        DB::table('patients')->insert([
                'first_name' => 'Matt',
                'last_name' => 'Damon',
                'email' => 'patient@email.com',
                'age' => 35,
                'gender' => 'male',
                'phone_number' => '01711717171',
                'address' => 'Dhaka',
                'notes' => 'none',
                'user_id' => $patient->id,
                'created_at' => Carbon::now()->format(('Y-m-d H:i:s'))
            ]);
    }

}
