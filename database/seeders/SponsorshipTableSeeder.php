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
                'sponsorship_name' =>'Lightning 24',
                'price' => '$2,99',
                'duration' => '24h',

            ],

            [
                'sponsorship_name' =>'72-Hour Marathon',
                'price' =>'$5,99',
                'duration' =>'72h',

            ],

            [
                'sponsorship_name' =>'Epic 144',
                'price' =>'$9,99',
                'duration' =>'144h',

            ],
        ];

        foreach($sponsorshipList as $sponsorship){

            Sponsorship::create($sponsorship);

        }
    }
}
