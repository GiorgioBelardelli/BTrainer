<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Profile;
use App\Models\Specialization;

class ApiController extends Controller
{
    public function getAll()
    {
        // Ottieni l'ID dell'utente loggato
        $userId = Auth::id();
        $profileId = Auth::id();

        // Ottieni il profilo dell'utente loggato
        $userProfile = Profile::where('user_id', $userId)->first();
        $userProfileSpecialization = Specialization::where('id', $profileId)->first();
        dd($userProfileSpecialization);

        // $users = User::where('specializations')->get();

        // $users = User::all();
        // $profiles = Profile::all();
        // $specializations = Specialization::all();

        return response()->json([
            'status' => 'success',
            'users' => $userProfileSpecialization,
            // 'profiles' => $profiles,
            // 'specializations' => $specializations
        ]);
    }
}
