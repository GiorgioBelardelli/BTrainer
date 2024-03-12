<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review :: factory() -> count(10) -> make()
        ->each(function($review){
            $profile = Profile :: inRandomOrder() -> first();
            $review -> profile() -> associate($profile -> id);

            $review -> save();
        });
    }
}
