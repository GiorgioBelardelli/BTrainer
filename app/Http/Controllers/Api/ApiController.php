<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Profile;
use App\Models\Specialization;
use App\Models\Review;
use App\Models\Vote;
use PhpParser\Node\Expr\FuncCall;

class ApiController extends Controller
{
    public function getAll()
    {
        // Recupera tutti gli utenti con i loro profili e specializzazioni
        $users = User::with('profile', 'profile.specializations')->get();

        // Costruisci un array per il risultato JSON
        $data = [];

        // Itera su ogni utente per creare una struttura dati per il risultato JSON
        foreach ($users as $user) {
            $userData = [
                'id' => $user->id,
                'name' => $user->name,
                'surname' => $user->surname,
                'email' => $user->email,
                'profile' => [
                    'id' => $user->profile->id,
                    'photo' => $user->profile->photo,
                    'plan_program' => $user->profile->plan_program,
                    'specializations' => $user->profile->specializations->pluck('name')->toArray(),
                    'reviews' => $user->profile->reviews->map(function ($review) {
                        return [
                            'id' => $review->id,
                            'name' => $review->name,
                            'surname' => $review->surname,
                            'date' => $review->date,
                            'content' => $review->content,
                        ];
                    }),
                    'votes' => $user->profile->votes->map(
                        function ($votes) {
                            return [
                                'value' => $votes->value,
                            ];
                        }
                    ),

                ],
            ];

            // Aggiungi i dati dell'utente all'array risultante
            $data[] = $userData;
        }

        // Ritorna la risposta JSON con lo stato di successo e i dati recuperati
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function getSpecialization()
    {
        $specializations = Specialization::all();

        return response()->json([
            'status' => 'success',
            'specializations' => $specializations,
        ]);
    }
}
