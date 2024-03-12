<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message :: factory() -> count(10) -> make()
        ->each(function($message){
            $profile = Profile :: inRandomOrder() -> first();
            $message -> profile() -> associate($profile -> id);

            $message -> save();
        });
    }
}
