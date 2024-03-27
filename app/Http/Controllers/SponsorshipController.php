<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Resources\SponsorshipResource;
use App\Models\Sponsorship;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    public function getSponsorships(Request $request){

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
        $sponsorshipId = $request->input('sponsorship_id');
        $profile = auth()->user()->profile; // Supponendo che il profilo utente sia disponibile tramite autenticazione

        $sponsorship = Sponsorship::find($sponsorshipId);

        $date = Carbon::createFromTimestamp(Carbon::now()->timestamp);
        $expireDate = $date-> copy() ->addHours($sponsorship->duration);

        // Aggiungi la sponsorizzazione al profilo
        $profile
            ->sponsorships()
            ->attach($sponsorshipId, ['created_at' => Carbon::now(), 'expire_date' => $expireDate]);

        return response()->json(['success' => true]);
    }
}
