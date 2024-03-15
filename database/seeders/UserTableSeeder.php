<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Specialization;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userList = [
            [
                'name' =>'James',
                'surname' => 'Smith',
                'email' => 'smith.james@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
        
            [
                'name' =>'John',
                'surname' => 'Johnson',
                'email' => 'johnson.john@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            
            [
                'name' =>'Mary',
                'surname' => 'Dean',
                'email' => 'dean.mary@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],

            [
                'name' =>'Robert',
                'surname' => 'Williams',
                'email' => 'williams.robert@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
        
            [
                'name' =>'Michael',
                'surname' => 'Brown',
                'email' => 'brown.michael@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
        
            [
                'name' =>'William',
                'surname' => 'Jones',
                'email' => 'jones.william@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
        
            [
                'name' =>'Jennifer',
                'surname' => 'Martinez',
                'email' => 'martinez.jennifer@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
        
            [
                'name' =>'Linda',
                'surname' => 'Williams',
                'email' => 'williams.linda@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
        
            [
                'name' =>'Patricia',
                'surname' => 'Brown',
                'email' => 'brown.patricia@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
        
            [
                'name' =>'Billy',
                'surname' => 'Wilson',
                'email' => 'wilson.billy@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
        ];
        
        foreach($userList as $user){

            User::create($user);

        }
    }
}
