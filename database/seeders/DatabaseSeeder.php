<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $users = \App\Models\User::all();

        $users->each( function($user){
            \App\Models\Tweet::factory()->count(20)->create([
                "user_id" => $user->id
            ]);
        });
    }
}
