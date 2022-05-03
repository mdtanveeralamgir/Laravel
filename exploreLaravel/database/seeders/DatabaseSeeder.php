<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Models\User;
use \App\Models\Post;
use \App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('role_user')->truncate();
        DB::table('roles')->truncate();

        //This will insert into the posts table as well
//        \App\Models\User::factory()->count(10)->hasPosts(1)->create();
            User::factory(10)->create()->each(function($user){
            $user->posts()->save(Post::factory()->make());
            $user->roles()->save(Role::factory()->make());
        });
    }
}
