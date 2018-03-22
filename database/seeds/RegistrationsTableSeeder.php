<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RegistrationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $patients = DB::table('patients')->get();
        foreach(range(0,10) as $index)
        DB::table('registrations')->insert([
            'patient_id' => $patients[rand(0, count($patients) - 1)]->id,
            'complain' => 'Aku sehat bro',
            'type' => rand(0,1),
            'created_at' => $faker->date($format = 'Y-m-d', $max = '2017-01-01'),
        ]);
    }
}
