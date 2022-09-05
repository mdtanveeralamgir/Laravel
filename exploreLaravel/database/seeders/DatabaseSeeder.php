<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory(100)->create()->each(function($user){
            $user->posts()->save(\App\Models\Post::factory()->make());
//            $user->roles()->save(Role::factory()->make());
        });
    }
}
