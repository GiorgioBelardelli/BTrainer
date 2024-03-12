<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;


class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Profile :: factory()
        // ->count(20)
        // ->make()
        // ->each(function($profile) {

        //     $user = User::inRandomOrder()-> limit(1) ->first();

        //     $profile -> user() -> associate($user->id);

        //     $profile -> save();
        // });

        User::all()->each(function($user) {
            // Controlla se l'utente ha già un profilo associato
            if (!$user->profile) {
                Profile::factory()->make()->each(function($profile) {
                    $user = User::inRandomOrder() ->first();

                        $profile -> user() -> associate($user->id);
            
                        $profile -> save();
            });
            }
        });
    }
}
