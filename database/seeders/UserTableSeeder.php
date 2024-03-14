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
                'name' =>'Gianni',
                'surname' => 'Verdi',
                'email' => 'test1@email.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],

            [
                'name' =>'Gianni',
                'surname' => 'Verdi',
                'email' => 'test2@email.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],

            [
                'name' =>'Anna',
                'surname' => 'Rossi',
                'email' => 'test3@email.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],

            [
                'name' =>'Gianni',
                'surname' => 'Rossi',
                'email' => 'test4@email.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],

            [
                'name' =>'Gianni',
                'surname' => 'Verdi',
                'email' => 'test5@email.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],

            [
                'name' =>'Gianni',
                'surname' => 'Verdi',
                'email' => 'test6@email.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],

            [
                'name' =>'Anna',
                'surname' => 'Rossi',
                'email' => 'test7@email.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],

            [
                'name' =>'Anna',
                'surname' => 'Rossi',
                'email' => 'test8@email.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],

            [
                'name' =>'Anna',
                'surname' => 'Rossi',
                'email' => 'test9@email.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],

            [
                'name' =>'Gianni',
                'surname' => 'Verdi',
                'email' => 'test10@email.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ],
        ];

        foreach($userList as $user){

            User::create($user);

        }
    }
}
