<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function rateProfile(Request $request)
    {
        $request->validate([
            'vote' => 'required|integer|min:1|max:5',
        ]);

        $voteId = $request->input('vote');
        $profileId = $request->input('id');


        // Trova il voto corrispondente all'ID fornito
        $vote = Vote::find($voteId);
        $profile = Profile::find($profileId);


        // Associare il voto al profilo tramite la tabella pivot
        $profile->votes()->attach($vote->id);

        return response()->json(['message' => 'Voto inviato con successo'], 200);
    }
}
