<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Specialization;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User:: factory()->count(10)->create();

        User :: factory()
        -> count(10)
        -> make()
        -> each(function($user) {

            $specialization = Specialization :: inRandomOrder() -> first();
            $user -> specializations() -> attach($specialization);
    
            $user -> save();
        });
    }
}