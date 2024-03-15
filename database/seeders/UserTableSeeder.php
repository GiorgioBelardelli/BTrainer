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

            [
                'name' =>'Emily',
                'surname' => 'Johnson',
                'email' => 'johnson.emily@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Jackson',
                'surname' => 'Smith',
                'email' => 'jack.son@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Madison',
                'surname' => 'Brown',
                'email' => 'bro.mad@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Ethan',
                'surname' => 'Davis',
                'email' => 'ethan.daviss@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Olivia',
                'surname' => 'Taylor',
                'email' => 'tayoliv@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Mason',
                'surname' => 'Williams',
                'email' => 'wil.Mass@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Ava',
                'surname' => 'Martinez',
                'email' => 'marav@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Liam',
                'surname' => 'Anderson',
                'email' => 'anderson.liam@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Sophia',
                'surname' => 'Thompson',
                'email' => 'thompson.sophia@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Noah',
                'surname' => 'Garcia',
                'email' => 'garnoah@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Isabella',
                'surname' => 'Rodriguez',
                'email' => 'rodriguez.isa@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Aiden',
                'surname' => 'Wilson',
                'email' => 'aiden.sonwil@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Emma',
                'surname' => 'Jones',
                'email' => 'emma.jones@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Lucas',
                'surname' => 'white',
                'email' => 'whitestluke@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Mia',
                'surname' => 'Moore',
                'email' => 'moremia@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Logan',
                'surname' => 'Jackson',
                'email' => 'jackson.logan@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Harper',
                'surname' => 'Harris',
                'email' => 'harp.harr@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Elijah',
                'surname' => 'Thomas',
                'email' => 'tomijah@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Armelia',
                'surname' => 'Martin',
                'email' => 'martin.armelia@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            [
                'name' =>'Benjamin',
                'surname' => 'Lee',
                'email' => 'lee.benjamin@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
            
        ];
        
        foreach($userList as $user){

            User::create($user);

        }
    }
}
