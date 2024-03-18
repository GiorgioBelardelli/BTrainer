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
            'curriculum' => 'CVprofile.pdf'
        ],
    
        [
            'photo' => 'PTrainer2.jpeg',
            'phone_number' => '(234) 567-8901',
            'plan_program' => "Utilizzo dispositivi e app di monitoraggio per tracciare il tuo progresso in tempo reale e adattare costantemente il tuo piano di allenamento per ottimizzare i tuoi risultati.",
            'work_address' => '456 Oak Avenue, Springfield, NY 67890',
            'curriculum' => 'CVprofile.png'
        ],
    
        [
            'photo' => 'PTrainer3.jpg',
            'phone_number' => '(345) 678-9012',
            'plan_program' => "Sia che tu stia cercando di competere o semplicemente desideri aumentare la tua massa muscolare, ti guiderò attraverso allenamenti intensi e strategie di nutrizione per raggiungere il tuo massimo potenziale.",
            'work_address' => '789 Maple Lane, Lakeside, TX 54321',
            'curriculum' => 'CVprofile.pdf'
        ],
    
        [
            'photo' => 'PTrainer4.webp',
            'phone_number' => '(456) 789-0123',
            'plan_program' => "Il mio approccio al fitness si basa sull'equilibrio tra corpo e mente. Ti aiuterò a migliorare la tua postura, ridurre lo stress e aumentare la tua flessibilità attraverso una pratica personalizzata.",
            'work_address' => '101 Elm Street, Riverdale, FL 98765',
            'curriculum' => 'CVprofile.pdf'
        ],
    
        [
            'photo' => 'PTrainer5.jpeg',
            'phone_number' => '(567) 890-1234',
            'plan_program' => "Come ex atleta professionista, comprendo l'importanza di un programma di allenamento completo. Offro un coaching dedicato che si concentra sull'equilibrio tra forza, resistenza, agilità e velocità.",
            'work_address' => '234 Pine Street, Hillcrest, WA 43210',
            'curriculum' => 'CVprofile.pdf'
        ],
    
        [
            'photo' => 'PTrainer6.webp',
            'phone_number' => '(678) 901-2345',
            'plan_program' => "a mia missione è aiutarti a raggiungere e mantenere un peso corporeo sano. Con un approccio personalizzato che include sia l'allenamento che la consulenza nutrizionale, ti aiuterò a trasformare il tuo stile di vita.",
            'work_address' => '567 Cedar Avenue, Brookside, CO 24680',
            'curriculum' => 'CVprofile.pdf'
        ],
    
        [
            'photo' => 'PTrainer7.webp',
            'phone_number' => '(789) 012-3456',
            'plan_program' => "Solida esperienza nella formazione di atleti di tutti i livelli. Con un approccio basato sull'allenamento funzionale ad alta intensità, ti guiderò attraverso allenamenti sfidanti che ti aiuteranno a migliorare la tua forza, resistenza e agilità.",
            'work_address' => '890 Birch Lane, Woodville, MI 13579',
            'curriculum' => 'CVprofile.pdf'
        ],
    
        [
            'photo' => 'PTrainer8.webp',
            'phone_number' => '(890) 123-4567',
            'plan_program' => "Mi specializzo nel coaching fitness per le donne. Con un approccio empatico e personalizzato, ti aiuterò a tonificare il tuo corpo, migliorare la tua salute generale e aumentare la tua fiducia in te stessa.",
            'work_address' => '112 Oakwood Drive, Sunset Beach, NC 97531',
            'curriculum' => 'CVprofile.pdf'
        ],
    
        [
            'photo' => 'PTrainer9.webp',
            'phone_number' => '(901) 234-5678',
            'plan_program' => "a mia missione è aiutarti a raggiungere e mantenere un peso corporeo sano. Con un approccio personalizzato che include sia l'allenamento che la consulenza nutrizionale, ti aiuterò a trasformare il tuo stile di vita.",
            'work_address' => '345 Maple Avenue, Pinecrest, GA 86420',
            'curriculum' => 'CVprofile.pdf'
        ],
    
        [
            'photo' => 'PTrainer10.jpeg',
            'phone_number' => '(012) 345-6789',
            'plan_program' => "Offro programmi di allenamento personalizzati per clienti di ogni esigenza. Utilizzando le più recenti tecnologie di comunicazione e monitoraggio, ti guiderò attraverso allenamenti efficaci.",
            'work_address' => '678 Elm Lane, Lakeview, OR 21987',
            'curriculum' => 'CVprofile.pdf'
        ],

        [
            'photo' => 'PTrainer11.jpg',
            'phone_number' => '(555) 123-4567',
            'plan_program' => "Sono un personal trainer certificato con una passione per la salute e il fitness. Specializzata in perdita di peso, mi impegno a guidare i miei clienti verso il raggiungimento dei loro obiettivi attraverso programmi personalizzati e motivazione costante.",
            'work_address' => '123 Oak Street, Springfield, IL 62701',
            'curriculum' => 'CVprofile.pdf'
        ],
            
        [
            'photo' => 'PTrainer12.jpg',
            'phone_number' => '(921) 564-5678',
            'plan_program' => "La mia missione è aiutare le persone a trasformare le loro vite attraverso l'esercizio fisico e la nutrizione. Grazie ad anni di esperienza, mi dedico a fornire programmi di allenamento efficaci per garantire il successo dei miei clienti.",
            'work_address' => '456 Elm Avenue, Riverside, CA 92501',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer13.jpg',
            'phone_number' => '(212) 555-6789',
            'plan_program' => "Sono una appassionata di fitness con una vasta esperienza nell'aiutare le persone a raggiungere i loro obiettivi. Utilizzo un approccio olistico che combina allenamento funzionale, stretching e alimentazione equilibrata per massimizzare i risultati.",
            'work_address' => '789 Pine Road, Greenville, SC 29601',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer14.jpg',
            'phone_number' => '(415) 789-0123',
            'plan_program' => "Come personal trainer, credo che la chiave per il successo sia l'impegno e la coerenza. Con un background in atletica e fitness, offro programmi di allenamento personalizzati che sfidano e motivano i miei clienti a superare i loro limiti.",
            'work_address' => '1011 Cedar Lane, Portland, OR 97201',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer15.jpg',
            'phone_number' => '(617) 234-5678',
            'plan_program' => "Con un approccio basato sulla scienza e sull'esperienza pratica, lavoro con i miei clienti per creare programmi di allenamento efficaci che li aiutino a raggiungere i loro obiettivi in modo sicuro e sostenibile.",
            'work_address' => '1213 Maple Court, Austin, TX 78701',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer16.png',
            'phone_number' => '(786) 555-4321',
            'plan_program' => "La mia filosofia è che il fitness debba essere divertente e gratificante. Come personal trainer, mi sforzo di rendere ogni sessione di allenamento stimolante e coinvolgente, mentre guido i miei clienti verso un migliore equilibrio tra corpo e mente.",
            'work_address' => '1415 Birch Street, Denver, CO 80201',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer17.PNG',
            'phone_number' => '(303) 987-6543',
            'plan_program' => "Sono una appassionata di fitness e benessere con una missione di aiutare le persone a vivere vite più sane e felici. Attraverso un approccio personalizzato e motivante, lavoro con i miei clienti per superare le sfide e raggiungere risultati duraturi.",
            'work_address' => '1617 Walnut Avenue, Atlanta, GA 30301',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer18.png',
            'phone_number' => '(512) 345-6789',
            'plan_program' => "Sono un personal trainer dedicato a fornire soluzioni di allenamento su misura per ogni cliente. Dal dimagrimento alla costruzione muscolare, mi impegno a garantire che ogni persona raggiunga il suo massimo potenziale.",
            'work_address' => '1819 Oak Street, Miami, FL 33101',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer19.png',
            'phone_number' => '(609) 890-1234',
            'plan_program' => "Sono un coach di fitness con una passione per l'allenamento funzionale e il miglioramento delle prestazioni. Utilizzo tecniche innovative e programmi di allenamento avanzati per aiutare i miei clienti a raggiungere risultati straordinari.",
            'work_address' => '2021 Pineview Drive, Nashville, TN 37201',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer20.webp',
            'phone_number' => '(804) 456-7890',
            'plan_program' => "Sono un personal trainer motivato e appassionato, con una vasta esperienza nel settore del fitness. Utilizzo un approccio personalizzato e progressivo per guidare i miei clienti attraverso il loro viaggio di trasformazione fisica e mentale.",
            'work_address' => '2223 Cedar Lane, Seattle, WA 98101',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer21.webp',
            'phone_number' => '(702) 678-9012',
            'plan_program' => "Sono una personal trainer dedicata a fornire soluzioni di allenamento innovative e mirate. Mi impegno a creare un ambiente di supporto e motivazione in cui i miei clienti possano raggiungere il successo a lungo termine.",
            'work_address' => '2425 Elm Avenue, Boston, MA 02101',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer22.jpg',
            'phone_number' => '(305) 987-6543',
            'plan_program' => "Sono un personal trainer con una passione per l'allenamento funzionale e l'ottimizzazione di prestazioni. Utilizzo un approccio scientifico e basato sull'evidenza per massimizzare i risultati dei miei clienti e migliorare la loro qualità di vita.",
            'work_address' => '2627 Maple Street, Chicago, IL 60601',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer23.png',
            'phone_number' => '(917) 234-5678',
            'plan_program' => "Mi considero più di una personal trainer, sono una coach di vita che si impegna a guidare i miei clienti verso il successo in ogni aspetto della loro salute e benessere. Lavoro per creare cambiamenti duraturi e significativi.",
            'work_address' => '2829 Birch Road, New York, NY 10001',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer24.png',
            'phone_number' => '(312) 345-6789',
            'plan_program' => "Sono un esperto di fitness con una passione per l'allenamento funzionale e il benessere generale. Utilizzo un approccio integrato che combina esercizi di forza, flessibilità e cardio per equilibrare livelli di salute e forma fisica ai miei clienti.",
            'work_address' => '3031 Oak Lane, Los Angeles, CA 90001',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer25.png',
            'phone_number' => '(206) 456-7890',
            'plan_program' => "Sono una personal trainer con una vasta esperienza nell'aiutare le persone a raggiungere i loro obiettivi di fitness. Uso un approccio empatico e comprensivo per guidare i miei clienti attraverso il loro viaggio di trasformazione personale.",
            'work_address' => '3233 Pine Street, Philadelphia, PA 19101',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer26.png',
            'phone_number' => '(713) 567-8901',
            'plan_program' => "Sono un personal trainer appassionato e dedicato con la missione di migliorare la vita delle persone attraverso l'allenamento e la nutrizione. Lavoro con i miei clienti per creare cambiamenti positivi e duraturi.",
            'work_address' => '3435 Walnut Avenue, Houston, TX 77001',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer27.png',
            'phone_number' => '(404) 678-9012',
            'plan_program' => "Come personal trainer, mi impegno a fornire un'esperienza di allenamento personalizzata e di alta qualità per ogni cliente. Aiuto le persone a raggiungere livelli di salute e benessere che non pensavano fosse possibile con focus mirati.",
            'work_address' => '3637 Maple Drive, San Francisco, CA 94101',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer28.jpg',
            'phone_number' => '(214) 789-0123',
            'plan_program' => "Sono un appassionato di fitness con la missione di ispirare e motivare gli altri a vivere vite più sane e attive. Metto me stesso per guidare i miei clienti verso il raggiungimento dei loro obiettivi di salute e fitness.",
            'work_address' => '3839 Elm Street, Dallas, TX 75201',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer29.jpg',
            'phone_number' => '(817) 890-1234',
            'plan_program' => "Sono una personal trainer dedicata a fornire risultati tangibili e duraturi per i miei clienti. Mi concentro sull'educazione e sull'empowerment per aiutare le persone a prendere il controllo della propria salute e del proprio benessere.",
            'work_address' => '4041 Birch Avenue, Washington, DC 20001',
            'curriculum' => 'CVprofile.pdf'
        ],
        
        [
            'photo' => 'PTrainer30.png',
            'phone_number' => '(241) 238-8688',
            'plan_program' => "Sono un esperto di fitness con una visione di fornire soluzioni di allenamento innovative e personalizzate per ogni cliente. Aiuto le persone a superare le loro sfide e raggiungere i loro obiettivi di salute e fitness mettendo anima e corpo.",
            'work_address' => '4243 Pineview Drive, Orlando, FL 32801',
            'curriculum' => 'CVprofile.pdf'
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

                // Specializzazioni
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