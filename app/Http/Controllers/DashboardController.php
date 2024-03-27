<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Sponsorship;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getProfile()
    {
        // Ottieni l'ID dell'utente loggato
        $userId = Auth::id();

        $sponsorships = Sponsorship::all();



        // Ottieni il profilo dell'utente loggato
        $userProfile = Profile::where('user_id', $userId)->first();

        // Passa $profiles e $userProfile alla vista
        return view('dashboard', compact('userProfile', 'sponsorships'));
    }

    public function getUserMessages()
{
    // Ottieni l'ID dell'utente loggato
    $userId = Auth::id();

    $sponsorships = Sponsorship::all();

    // Ottieni il profilo dell'utente loggato
    $userProfile = Profile::where('user_id', $userId)->first();

    // Restituisci la vista 'usermessages' con i dati necessari
    return view('usermessages', compact('userProfile', 'sponsorships'));
}

    public function getUserReviews()
    {
        // Ottieni l'ID dell'utente loggato
        $userId = Auth::id();

        $sponsorships = Sponsorship::all();

        // Ottieni il profilo dell'utente loggato
        $userProfile = Profile::where('user_id', $userId)->first();

        // Restituisci la vista 'usermessages' con i dati necessari
        return view('userreviews', compact('userProfile', 'sponsorships'));
    }

    public function getSponsorship()
    {
        // Ottieni l'ID dell'utente loggato
        $userId = Auth::id();

        $sponsorships = Sponsorship::all();

        // Ottieni il profilo dell'utente loggato
        $userProfile = Profile::where('user_id', $userId)->first();

        // Restituisci la vista 'usermessages' con i dati necessari
        return view('sponsorship', compact('userProfile', 'sponsorships'));
    }

    public function getStatistics()
    {
        // Ottieni l'ID dell'utente loggato
        $userId = Auth::id();

        $sponsorships = Sponsorship::all();
        $votes = Vote :: all();

        $voti2022 = 0;
        $voti2023 = 0;
        $voti2024 = 0;


        // Ottieni il profilo dell'utente loggato
        $userProfile = Profile::where('user_id', $userId)->first();
        foreach ($userProfile->votes as $vote) {
            if(substr($vote->pivot->created_at,0, 4) === '2022'){
                $voti2022++;
            }
            if(substr($vote->pivot->created_at,0, 4) === '2023'){
                $voti2023++;
            }
            if(substr($vote->pivot->created_at,0, 4) === '2024'){
                $voti2024++;
            }
        }

        $votoGennaio = 0;
        $votoFebbraio = 0;
        $votoMarzo = 0;
        $votoAprile = 0;
        $votoMaggio = 0;
        $votoGiugno = 0;
        $votoLuglio = 0;
        $votoAgosto = 0;
        $votoSettembre = 0;
        $votoOttobre = 0;
        $votoNovembre = 0;
        $votoDicembre = 0;

        $userProfile = Profile::where('user_id', $userId)->first();
        foreach ($userProfile->votes as $vote) {
            if(substr($vote->pivot->created_at,5, 2) === '01'){
                $votoGennaio++;
            }if(substr($vote->pivot->created_at,5, 2) === '02'){
                $votoFebbraio++;
            }if(substr($vote->pivot->created_at,5, 2) === '03'){
                $votoMarzo++;
            }if(substr($vote->pivot->created_at,5, 2) === '04'){
                $votoAprile++;
            }if(substr($vote->pivot->created_at,5, 2) === '05'){
                $votoMaggio++;
            }if(substr($vote->pivot->created_at,5, 2) === '06'){
                $votoGiugno++;
            }if(substr($vote->pivot->created_at,5, 2) === '07'){
                $votoLuglio++;
            }if(substr($vote->pivot->created_at,5, 2) === '08'){
                $votoAgosto++;
            }if(substr($vote->pivot->created_at,5, 2) === '09'){
                $votoSettembre++;
            }if(substr($vote->pivot->created_at,5, 2) === '10'){
                $votoOttobre++;
            }if(substr($vote->pivot->created_at,5, 2) === '11'){
                $votoNovembre++;
            }if(substr($vote->pivot->created_at,5, 2) === '12'){
                $votoDicembre++;
            }
        }

        // Restituisci la vista 'usermessages' con i dati necessari
        return view('userstatistics', compact('userProfile', 'sponsorships', 'votes','voti2022','voti2023','voti2024', 'votoGennaio', 'votoFebbraio', 'votoMarzo', 'votoAprile', 'votoMaggio', 'votoGiugno', 'votoLuglio', 'votoAgosto', 'votoSettembre', 'votoOttobre', 'votoNovembre', 'votoDicembre',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
