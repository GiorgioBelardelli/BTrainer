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
    private $profileList = [
        [
            'photo'  => 'PTrainer1.png',
            'phone_number' => 3331234567,
            'plan_program' => 'descrizione casuale',
            'work_address' => 'descrizione casuale',
            'curriculum' => 'descrizione casuale'
        ],
    
        [
            'photo'  => 'PTrainer2.jpeg',
            'phone_number' => 3332345678,
            'plan_program' => 'descrizione casuale',
            'work_address' => 'descrizione casuale',
            'curriculum' => 'descrizione casuale'
        ],
    
        [
            'photo'  => 'PTrainer3.jpg',
            'phone_number' => 3333456789,
            'plan_program' => 'descrizione casuale',
            'work_address' => 'descrizione casuale',
            'curriculum' => 'descrizione casuale'
        ],
    
        [
            'photo'  => 'PTrainer4.webp',
            'phone_number' => 38945678905,
            'plan_program' => 'descrizione casuale',
            'work_address' => 'descrizione casuale',
            'curriculum' => 'descrizione casuale'
        ],
    
        [
            'photo'  => 'PTrainer5.jpeg',
            'phone_number' => 3335678901,
            'plan_program' => 'descrizione casuale',
            'work_address' => 'descrizione casuale',
            'curriculum' => 'descrizione casuale'
        ],
    
        [
            'photo'  => 'PTrainer6.webp',
            'phone_number' => 3736789012,
            'plan_program' => 'descrizione casuale',
            'work_address' => 'descrizione casuale',
            'curriculum' => 'descrizione casuale'
        ],
    
        [
            'photo'  => 'PTrainer7.webp',
            'phone_number' => 3537890123,
            'plan_program' => 'descrizione casuale',
            'work_address' => 'descrizione casuale',
            'curriculum' => 'descrizione casuale'
        ],
    
        [
            'photo'  => 'PTrainer8.webp',
            'phone_number' => 3238901234,
            'plan_program' => 'descrizione casuale',
            'work_address' => 'descrizione casuale',
            'curriculum' => 'descrizione casuale'
        ],
    
        [
            'photo'  => 'PTrainer9.webp',
            'phone_number' => 385901234,
            'plan_program' => 'descrizione casuale',
            'work_address' => 'descrizione casuale',
            'curriculum' => 'descrizione casuale'
        ],
    
        [
            'photo'  => 'PTrainer10.jpeg',
            'phone_number' => 32301234560,
            'plan_program' => 'descrizione casuale',
            'work_address' => 'descrizione casuale',
            'curriculum' => 'descrizione casuale'
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->profileList as $index => $profileData) {
            $profileId = $index + 1; // Incrementa l'indice di 1 per ottenere l'ID del profilo

            $user = User::find($profileId); // Trova l'utente corrispondente all'ID del profilo

            if ($user && !$user->profile) {
                // Verifica se l'utente esiste e non ha già un profilo associato

                // Crea una nuova istanza di Profilo
                $profile = new Profile($profileData);

                // Associa il profilo all'utente
                $profile->user()->associate($user);

                // Salva il profilo
                $profile->save();

                // Allega specializzazioni
                $specializations = Specialization::inRandomOrder()->take(rand(1, 4))->get();
                $profile->specializations()->attach($specializations);

                // Allega voti
                $votes = Vote::inRandomOrder()->take(rand(1, 6))->get();
                $profile->votes()->attach($votes);

                // Allega sponsorizzazione (se necessario)
                // if (rand(0, 1) == 1) {
                //     $sponsorship = Sponsorship::inRandomOrder()->first();
                //     $profile->sponsorships()->attach($sponsorship->id);
                // }
            }
        }
    }


}



// User :: factory()
//         -> count(20)
//         -> create()
//         -> each(function($user) {

//             $specialization = Specialization::inRandomOrder()-> limit(rand(1,6)) ->first();

//             $user -> specializations() -> attach($specialization->id);

//         });
