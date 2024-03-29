<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use App\Models\Profile;

class MessageTableSeeder extends Seeder
{
    private $messageContents = [
        "Ciao! Sarei interessato/a a ricevere maggiori informazioni sui tuoi servizi di allenamento. Potresti darmi qualche dettaglio in più?",
        "Buongiorno! Vorrei sapere di più sulla tua metodologia di allenamento e sugli obiettivi che aiuti i tuoi clienti a raggiungere. Potresti darmi qualche indicazione?",
        "Salve! Sto cercando un personal trainer che possa aiutarmi a raggiungere i miei obiettivi di fitness. Potresti spiegarmi come svolgi le tue sessioni di allenamento e cosa posso aspettarmi?",
        "Ciao! Ho sentito parlare molto bene di te e vorrei capire se offri programmi personalizzati di allenamento. Potresti darmi qualche informazione in più?",
        "Buongiorno! Sto valutando diverse opzioni per migliorare il mio stato di forma e ho letto ottime recensioni su di te. Potresti dirmi quali sono i tuoi punti di forza come personal trainer?",
        "Salve! Sono interessato/a ad iniziare un percorso di allenamento, ma vorrei sapere quali tipi di esercizi proponi e come personalizzi gli allenamenti in base alle esigenze individuali. Potresti darmi qualche dettaglio in merito?",
        "Ciao! Ho visto che hai ottenuto ottimi risultati con i tuoi clienti e vorrei capire meglio come potresti aiutarmi a raggiungere i miei obiettivi di fitness. Potresti darmi qualche consiglio?",
        "Buongiorno! Mi piacerebbe avere più informazioni sui tuoi programmi di allenamento, come la durata delle sessioni e la frequenza raccomandata. Potresti darmi qualche indicazione in merito?",
        "Salve! Sto cercando un personal trainer che possa adattare gli allenamenti alle mie esigenze e al mio livello di fitness attuale. Potresti spiegarmi come personalizzi i programmi di allenamento per i tuoi clienti?",
        "Ciao! Sono interessato/a a iniziare un programma di allenamento con te, ma vorrei sapere se offri consulenza anche sull'alimentazione e sullo stile di vita. Potresti darmi qualche informazione in merito?"
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();

        $startDate = strtotime('-1 year');
        $endDate = time();

        $profiles = Profile::inRandomOrder()->limit(100)->get();

        foreach ($profiles as $profile) {
            $numMessages = rand(1, 3);

            for ($i = 0; $i < $numMessages; $i++) {
                $reviewDate = date('Y-m-d H:i:s', mt_rand($startDate, $endDate)); // Aggiunto l'orario casuale
                $content = $this->messageContents[array_rand($this->messageContents)];

                $message = new Message([
                    'name' => $faker->firstName(),
                    'surname' => $faker->lastName(),
                    'email' => $faker->email(),
                    'date' => $reviewDate,
                    'content' => $content,
                ]);

                $profile->messages()->save($message);
            }
        }
    }
}
