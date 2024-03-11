<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Specialization;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializationList = [
            [
                'specialization_name'  => 'Bodybuilding'
            ],
            [
                'specialization_name'  => 'Powerlifting'
            ],
            [
                'specialization_name'  => 'CrossFit'
            ],
            [
                'specialization_name'  => 'Calistenica'
            ],
            [
                'specialization_name'  => 'Yoga'
            ],
            [
                'specialization_name'  => 'Pilates'
            ],
            [
                'specialization_name'  => 'Kickboxing'
            ],
            [
                'specialization_name'  => 'High-Intensity Interval Training'
            ],
            [
                'specialization_name'  => 'Recupero post-infortunio'
            ],
            [
                'specialization_name'  => 'Personal Defence'
            ],
            
        ];

        foreach($specializationList as $specialization){
            
            Specialization::create($specialization);
      
        }

    }
}
