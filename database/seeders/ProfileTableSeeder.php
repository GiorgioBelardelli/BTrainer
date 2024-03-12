<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function($user) {
            // Controlla se l'utente ha già un profilo associato
            if (!$user->profile) {
                // Crea un profilo associato a questo utente
                $profile = Profile::factory()->make();
                $profile->user()->associate($user);
                $profile->save();
            }
        });
    }
}