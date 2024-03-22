<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Sponsorship;
use App\Models\User;
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
