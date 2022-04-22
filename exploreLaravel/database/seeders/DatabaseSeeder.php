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
        //This will insert into the posts table as well
        \App\Models\User::factory()->count(10)->hasPosts(1)->create();
        $this->call([
            RoleSeeder::class,
            RoleUserSeeder::class
        ]);
    }
}
