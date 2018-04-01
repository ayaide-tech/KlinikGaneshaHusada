<?php

use Illuminate\Database\Seeder;
use App\Diagnosis;

class PrescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $diagnoses = Diagnosis::all();
        foreach(range(0,9) as $index){
            DB::table('prescriptions')->insert([
                'diagnosis_id' => $diagnoses[rand(0, 10)]->id,
                'total_price' => rand(75000,250000), 
            ]);
        }
        

    }
}
