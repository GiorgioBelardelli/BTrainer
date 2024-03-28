<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Resources\SponsorshipResource;
use App\Models\Sponsorship;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    public function getSponsorships(){
        
       $sponsorships = Sponsorship::all();

       return SponsorshipResource::collection($sponsorships);
       //return response()->json($sponsorships, 200);
    }

    public function checkout($id)
    {
        $sponsorship = Sponsorship::find($id);

        return view('checkout', compact('sponsorship'));
    }

    public function linkToProfile(Request $request)
    {   
        // Mi ricavo le informazioni di profilo e sponsorship
        $sponsorshipId = $request->input('sponsorship_id');
        $profile = auth()->user()->profile;
        $sponsorship = Sponsorship::find($sponsorshipId);

         //Se esiste una sponnsorship in cui la expire date sia maggiore alla data odierna
        if ($profile->sponsorships()->whereDate('expire_date', '>', Carbon::now())->exists()) {

            // Mi ricavo la expire_date dell'ultima sponsorizzazione attiva 
            $lastSponsorshipExpireDate = $profile->sponsorships()->max('expire_date');
            $lastSponsorshipExpireDate = Carbon::parse($lastSponsorshipExpireDate);
            
            // Gli aggiungo le ore della sponsorizzazione
            $expireDate = $lastSponsorshipExpireDate->copy()->addHours($sponsorship->duration);

        } else {
            
            // Nel caso non ci sono sponsorizzazioni attive
            $expireDate = Carbon::now()->addHours($sponsorship->duration);
        }
    
        $profile
            ->sponsorships()
            ->attach($sponsorshipId, ['created_at' => Carbon::now(), 'expire_date' => $expireDate]);
    
        return response()->json(['success' => true]);
    }
}

 // //Se esiste una sponnsorship in cui la expire date sia maggiore alla data odierna
        // if ($profile->sponsorships()->whereDate('expire_date', '>', Carbon::now())->exists()) {

        //     // Mi ricavo la expire_date dell'ultima sponsorizzazione attiva 
        //     $lastSponsorshipExpireDate = $profile->sponsorships()->max('expire_date');
        //     $lastSponsorshipExpireDate = Carbon::parse($lastSponsorshipExpireDate);
            
        //     // Gli aggiungo le ore della sponsorizzazione
        //     $expireDate = $lastSponsorshipExpireDate->copy()->addHours($sponsorship->duration);

        // } else {
            
        //     // Nel caso non ci sono sponsorizzazioni attive
        //     $expireDate = Carbon::now()->addHours($sponsorship->duration);
        // }
    
        // $profile
        //     ->sponsorships()
        //     ->attach($sponsorshipId, ['created_at' => Carbon::now(), 'expire_date' => $expireDate]);
    
        // return response()->json(['success' => true]);

        //$lastActiveSponsorship = $profile->sponsorships()
        // ->whereDate('expire_date', '>', Carbon::now())
        // ->latest('expire_date')
        // ->first();

        // // Se esiste una sponsorship attiva
        // if ($lastActiveSponsorship) {
        // $expireDate = Carbon::parse($lastActiveSponsorship->expire_date)
        // ->addHours($sponsorship->duration); // Aggiungi direttamente le ore alla data di scadenza precedente
        // } else {
        // // Nel caso non ci siano sponsorizzazioni attive
        // $expireDate = Carbon::now()->addHours($sponsorship->duration);
        // }

        // $profile->sponsorships()
        // ->attach($sponsorshipId, ['created_at' => Carbon::now(), 'expire_date' => $expireDate]);

        // return response()->json(['success' => true]);

