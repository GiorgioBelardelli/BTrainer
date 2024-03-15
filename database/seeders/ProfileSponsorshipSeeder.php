<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Sponsorship;


class ProfileSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $sponsorhips= Sponsorship::all();

        // foreach($sponsorhips as $sponsorship){

        // }

        // Sponsorship::all()->each(function ($sponsorhip) {

        //     if($sponsorhip->profile){
        //        Sponsorship
        //     }
        // });

        $profiles = Profile::all();
        //$sponsorships = Sponsorship::all();
        
        foreach ($profiles as $profile) {
            // Associa un numero casuale di sponsorizzazioni a ciascun profilo
            if (rand(0, 1) == 1) { // Simulazione di probabilità del 50% di avere una sponsorship
                
                $sponsorships = Sponsorship::all() -> take(rand(1, 3)); //Mi prendo casualmente una due o tutte le sponsorizzazioni

                foreach ($sponsorships as $sponsorship) {
                    
                    $timestamp = rand(Carbon::now()->subDays(30)->timestamp, Carbon::now()->timestamp);
                    $date = Carbon::createFromTimestamp($timestamp);
                    
                    $expireDate = $date-> copy() ->addHours($sponsorship->duration); // Calcola la data di scadenza aggiungendo la durata della sponsorizzazione
                    
                    $profile->sponsorships()->attach($sponsorship->id, 
                    [
                        'created_at' => $date, 
                        'expire_date' => $expireDate
                    ]);
                }               
            }
        }
        
    }
}


// ['expire_date' => $expireDate]


//$sponsorship = Sponsorship::inRandomOrder()->first();
// $duration = $sponsorships -> duration;
// $expireDate = Carbon::now()->addHours($sponsorship->duration);