<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(Profile $profile, Request $request)
    {
        $request->validate([
            'vote' => 'required|integer|min:1|max:5',
        ]);

        // Creazione del voto
        $vote = new Vote();
        $vote->vote = $request->vote;
        $vote->save();

        // Associare il voto al profilo
        $profile->votes()->attach($vote->id);

        return redirect()->route('profiles.show', $profile)->with('success', 'Voto inviato con successo!');
    }
    
}
