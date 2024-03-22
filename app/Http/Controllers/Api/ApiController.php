<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Http\Resources\SponsorshipResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Profile;
use App\Models\Specialization;
use App\Models\Review;
use App\Models\Message;
use App\Models\Sponsorship;
use App\Models\Vote;
use Braintree\Gateway;
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

    public function getVotes()
    {
        $votes = Vote::all();

        return response()->json([
            'status' => 'success',
            'votes' => $votes,
        ]);
    }

    public function generate(Request $request, Gateway $gateway)
    {

        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);

        //return 'generate';
    }

    public function makePayment(PaymentRequest $request, Gateway $gateway)
    {

        $sponsorship = Sponsorship::find($request->sponsorship);

        $result = $gateway->transaction()->sale([

            'amount' => $sponsorship->price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => 'true',
                'message' => 'Transazione eseguita con successo!',
            ];

            return response()->json($data);
        } else {
            $data = [
                'success' => 'false',
                'message' => 'Transazione fallita',
            ];

            return response()->json($data, 401);
        }
    }

    public function createReview(Request $request)
    {

        $data = $request->all();
        $review = new Review;

        $review->name = $data['name'];
        $review->surname = $data['surname'];
        $review->date = $data['date'];
        $review->content = $data['content'];
        $review->vote = $data['vote'];
        $review->profile_id = $data['profile_id'];

        $review->save();

        return response()->json([
            'success' => true,
            'review' => $review
        ]);
    }


    public function createMessage(Request $request)
    {

        $data = $request->all();
        $message = new Message;

        $message->name = $data['name'];
        $message->surname = $data['surname'];
        $message->date = now();
        $message->content = $data['content'];
        $message->email = $data['email'];
        $message->profile_id = $data['profile_id'];

        $message->save();

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    public function createVote(Request $request)
    {

        $data = $request->all();
        $vote = new Vote;

        $vote->value = $data['value'];

        $vote->save();

        return response()->json([
            'success' => true,
            'vote' => $vote
        ]);
    }

    public function getSponsoredProfiles()
    {
        $users = User::with('profile', 'profile.specializations')
            ->whereHas('profile.sponsorships', function ($query) {
                $query->where('expire_date', '>=', now());
            })
            ->get();

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
}
