<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsorship;

class SponsorshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorshipList = [
            [
                'name' =>'Lightning 24',
                'price' => 2.99,
                'duration' => 24,
            ],

            [
                'name' =>'72-Hour Marathon',
                'price' =>5.99,
                'duration' =>72,
            ],

            [
                'name' =>'Epic 144',
                'price' =>9.99,
                'duration' =>144,
            ],
        ];

        foreach($sponsorshipList as $sponsorship){

            Sponsorship::create($sponsorship);

        }
    }
}
