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
            'photo' => 'PTrainer1.png',
            'phone_number' => '(123) 456-7890',
            'plan_program' => "Con oltre 5 anni di esperienza nel settore del fitness, mi impegno a creare programmi di allenamento personalizzati che si integrino perfettamente con una dieta equilibrata per ottenere risultati ottimali.",
            'work_address' => '123 Main Street, Anytown, CA 12345',
            'curriculum' => 'james.smith'
        ],
    
        [
            'photo' => 'PTrainer2.jpeg',
            'phone_number' => '(234) 567-8901',
            'plan_program' => "Utilizzo dispositivi e app di monitoraggio per tracciare il tuo progresso in tempo reale e adattare costantemente il tuo piano di allenamento per ottimizzare i tuoi risultati.",
            'work_address' => '456 Oak Avenue, Springfield, NY 67890',
            'curriculum' => 'john.johnson'
        ],
    
        [
            'photo' => 'PTrainer3.jpg',
            'phone_number' => '(345) 678-9012',
            'plan_program' => "Sia che tu stia cercando di competere o semplicemente desideri aumentare la tua massa muscolare, ti guiderò attraverso allenamenti intensi e strategie di nutrizione per raggiungere il tuo massimo potenziale.",
            'work_address' => '789 Maple Lane, Lakeside, TX 54321',
            'curriculum' => 'mary.dean'
        ],
    
        [
            'photo' => 'PTrainer4.webp',
            'phone_number' => '(456) 789-0123',
            'plan_program' => "Il mio approccio al fitness si basa sull'equilibrio tra corpo e mente. Ti aiuterò a migliorare la tua postura, ridurre lo stress e aumentare la tua flessibilità attraverso una pratica personalizzata.",
            'work_address' => '101 Elm Street, Riverdale, FL 98765',
            'curriculum' => 'robert.williams'
        ],
    
        [
            'photo' => 'PTrainer5.jpeg',
            'phone_number' => '(567) 890-1234',
            'plan_program' => "Come ex atleta professionista, comprendo l'importanza di un programma di allenamento completo. Offro un coaching dedicato che si concentra sull'equilibrio tra forza, resistenza, agilità e velocità.",
            'work_address' => '234 Pine Street, Hillcrest, WA 43210',
            'curriculum' => 'michael.brown'
        ],
    
        [
            'photo' => 'PTrainer6.webp',
            'phone_number' => '(678) 901-2345',
            'plan_program' => "a mia missione è aiutarti a raggiungere e mantenere un peso corporeo sano. Con un approccio personalizzato che include sia l'allenamento che la consulenza nutrizionale, ti aiuterò a trasformare il tuo stile di vita.",
            'work_address' => '567 Cedar Avenue, Brookside, CO 24680',
            'curriculum' => 'william.jones'
        ],
    
        [
            'photo' => 'PTrainer7.webp',
            'phone_number' => '(789) 012-3456',
            'plan_program' => "Solida esperienza nella formazione di atleti di tutti i livelli. Con un approccio basato sull'allenamento funzionale ad alta intensità, ti guiderò attraverso allenamenti sfidanti che ti aiuteranno a migliorare la tua forza, resistenza e agilità.",
            'work_address' => '890 Birch Lane, Woodville, MI 13579',
            'curriculum' => 'jennifer.martinez'
        ],
    
        [
            'photo' => 'PTrainer8.webp',
            'phone_number' => '(890) 123-4567',
            'plan_program' => "i specializzo nel coaching fitness per le donne. Con un approccio empatico e personalizzato, ti aiuterò a tonificare il tuo corpo, migliorare la tua salute generale e aumentare la tua fiducia in te stessa.",
            'work_address' => '112 Oakwood Drive, Sunset Beach, NC 97531',
            'curriculum' => 'linda.williams'
        ],
    
        [
            'photo' => 'PTrainer9.webp',
            'phone_number' => '(901) 234-5678',
            'plan_program' => "a mia missione è aiutarti a raggiungere e mantenere un peso corporeo sano. Con un approccio personalizzato che include sia l'allenamento che la consulenza nutrizionale, ti aiuterò a trasformare il tuo stile di vita.",
            'work_address' => '345 Maple Avenue, Pinecrest, GA 86420',
            'curriculum' => 'patricia.brown'
        ],
    
        [
            'photo' => 'PTrainer10.jpeg',
            'phone_number' => '(012) 345-6789',
            'plan_program' => "Offro programmi di allenamento personalizzati per clienti di ogni esigenza. Utilizzando le più recenti tecnologie di comunicazione e monitoraggio, ti guiderò attraverso allenamenti efficaci.",
            'work_address' => '678 Elm Lane, Lakeview, OR 21987',
            'curriculum' => 'billy.wilson'
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
            $profileId = $index + 1; // Incremento dell'indice

            $user = User::find($profileId); // utente corrispondente all'ID (profilo)

            if ($user && !$user->profile) {
                // Verifica se l'utente esiste e non ha già un profilo associato

                $profile = new Profile($profileData);

                $profile->user()->associate($user);

                $profile->save();

                // pecializzazioni
                $specializations = Specialization::inRandomOrder()->take(rand(1, 3))->get();
                $profile->specializations()->attach($specializations);

                // voti
                $votes = Vote::inRandomOrder()->take(rand(1, 5))->get();
                $profile->votes()->attach($votes);

                // sponsorizzazione (se necessaria)
                // if (rand(0, 1) == 1) {
                //     $sponsorship = Sponsorship::inRandomOrder()->first();
                //     $profile->sponsorships()->attach($sponsorship->id);
                // }
            }
        }
    }
}