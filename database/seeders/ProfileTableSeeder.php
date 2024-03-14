<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;
use App\Models\Sponsorship;
use App\Models\Specialization;
use App\Models\Vote;

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

            // $photos = [
            //     [
            //         'photo'  => 'PTrainer1.png'
            //     ],
            //     [
            //         'photo'  => 'PTrainer2.jpeg'
            //     ],
            //     [
            //         'photo'  => 'PTrainer3.jpg'
            //     ],
            //     [
            //         'photo'  => 'PTrainer3.webp'
            //     ],
            //     [
            //         'photo'  => 'PTrainer4.webp'
            //     ],
            //     [
            //         'photo'  => 'PTrainer5.jpeg'
            //     ]
            // ];


            if (!$user->profile) {
                // Crea un profilo associato a questo utente
                $profile = Profile::factory()->make();
                $profile->user()->associate($user);


                // foreach($photos as $photo){

                    $profile->photo = 'PTrainer1.png';

                // }

                $profile->save();

                if (rand(0, 1) == 1) { // Simulazione di probabilità del 50% di avere una sponsorship
                    $sponsorship = Sponsorship::inRandomOrder()->first();
                    $profile->sponsorships()->attach($sponsorship->id);
                }

                $specializations = Specialization::inRandomOrder()->take(rand(1, 4))->get();
                foreach ($specializations as $specialization) {
                    $profile->specializations()->attach($specialization->id);
                }


                $votes = Vote::inRandomOrder()->take(rand(1, 6))->get();
                foreach ($votes as $vote) {
                    $profile->votes()->attach($vote->id);
                }


                // limit(rand(1,6))
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
