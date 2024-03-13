<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;
use App\Models\Sponsorship;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function ($user) {
            // Controlla se l'utente ha già un profilo associato
            if (!$user->profile) {
                // Crea un profilo associato a questo utente
                $profile = Profile::factory()->make();
                $profile->user()->associate($user);

                if (rand(0, 1) == 1) { // Simulazione di probabilità del 50% di avere una sponsorship
                    $sponsorship = Sponsorship::inRandomOrder()->first();
                    $profile->sponsorships()->attach($sponsorship->id);
                }

                $profile->save();
            }
        });
    }
}



// User :: factory()
//         -> count(20)
//         -> create()
//         -> each(function($user) {

//             $specialization = Specialization::inRandomOrder()-> limit(rand(1,6)) ->first();

//             $user -> specializations() -> attach($specialization->id);

//         });