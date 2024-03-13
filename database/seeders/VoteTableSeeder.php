<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Vote;


class VoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $voteList = [

            [
                'value'  => 1
            ],
            [
                'value'  => 2
            ],
            [
                'value'  => 3
            ],
            [
                'value'  => 4
            ],
            [
                'value'  => 5
            ]
            
        ];

        foreach($voteList as $vote){
            
            Vote::create($vote);
      
        }

    }
}
