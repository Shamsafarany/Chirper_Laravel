<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ChirpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::count()< 3? collect([
            User::create([
                'name' => 'Alice Developer',
                'email' => 'alice@gmail.com',
                'password'=> bcrypt('12321($#(13'),
            ]),
            User::create([
                'name' => 'Rana Jam',
                'email' => 'rana@gmail.com',
                'password'=> bcrypt('fdsgs21($#(13'),
            ]),
            User::create([
                'name' => 'Ahmad Zamil',
                'email' => 'ahmad@gmail.com',
                'password'=> bcrypt('dc9832042g'),
            ]),
        ]): User::take(3)->get();

        $chirps = [
                'Laravel is amazing!',
                'Just learned about Eloquent ORM.',
                'TDD is a game changer.',
                'Building Chirper with Laravel.',
                'The community is awesome.',
                'Best PHP framework ever!',
                'Learning Laravel day by day.',
                'Just deployed my first app.',
                'Next stop: Livewire!',
                'Eloquent relationships are powerful.'
        ];

        foreach ($chirps as $chirp) {
            $users->random()->chirps()->create([
                'message'=> $chirp
            ]);
        }


    }
}
