<?php

namespace App\Http\Controllers;

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
}
