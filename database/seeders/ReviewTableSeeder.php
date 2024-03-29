<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Review;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Array of sample review contents.
     *
     * @var array
     */
    private $reviewContents = [
        "Il personal trainer è stato fantastico! Ha davvero trasformato il mio modo di allenarmi.",
        "Ho apprezzato molto la professionalità e la motivazione del personal trainer durante le sessioni.",
        "Le sessioni di allenamento con il personal trainer sono state estremamente efficaci nel raggiungere i miei obiettivi.",
        "Consiglio vivamente questo personal trainer a chiunque cerchi un cambiamento reale nel proprio fitness.",
        "Sono rimasto impressionato dalla conoscenza approfondita del personal trainer e dalla sua capacità di adattare gli allenamenti alle mie esigenze.",
        "Le sessioni di allenamento sono state intense ma gratificanti. Grazie al personal trainer per la guida costante.",
        "Ho notato un miglioramento significativo nella mia resistenza e forza grazie agli allenamenti personalizzati del personal trainer.",
        "Il personal trainer è stato sempre disponibile e attento alle mie esigenze durante le sessioni di allenamento.",
        "Le sessioni con il personal trainer sono state un investimento prezioso per la mia salute e benessere generale.",
        "Ho raggiunto risultati che non avrei mai pensato di poter ottenere grazie all'assistenza e alla guida del personal trainer.",
        "Top! Mi sono trovato benissimo.",
        "Consigliatissimo!"
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
            $numReviews = rand(3, 4);

            for ($i = 0; $i < $numReviews; $i++) {
                $reviewDate = date('Y-m-d', mt_rand($startDate, $endDate));
                $content = $this->reviewContents[array_rand($this->reviewContents)];

                $review = new Review([
                    'name' => $faker->firstName(),
                    'surname' => $faker->lastName(),
                    'date' => $reviewDate,
                    'content' => $content,
                ]);

                $profile->reviews()->save($review);
            }
        }
    }
}
