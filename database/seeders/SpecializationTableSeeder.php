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
                'name'  => 'Bodybuilding'
            ],
            [
                'name'  => 'Powerlifting'
            ],
            [
                'name'  => 'CrossFit'
            ],
            [
                'name'  => 'Calistenica'
            ],
            [
                'name'  => 'Yoga'
            ],
            [
                'name'  => 'Pilates'
            ],
            [
                'name'  => 'Kickboxing'
            ],
            [
                'name'  => 'High-Intensity Interval Training'
            ],
            [
                'name'  => 'Recupero post-infortunio'
            ],
            [
                'name'  => 'Personal Defence'
            ],
            
        ];

        foreach($specializationList as $specialization){
            
            Specialization::create($specialization);
      
        }

    }
}
