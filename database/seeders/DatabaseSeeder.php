<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Review;
use App\Models\Specialization;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this -> call([
            SpecializationTableSeeder :: class,
            UserTableSeeder :: class,
            SponsorshipTableSeeder :: class,
            VoteTableSeeder :: class,
            ProfileTableSeeder :: class,
            ReviewTableSeeder :: class,
            MessageTableSeeder :: class,
            ProfileSponsorshipSeeder :: class,
        ]);
    }
}
