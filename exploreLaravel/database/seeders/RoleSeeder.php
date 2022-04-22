<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * @return void
     */
    public function run()
    {
        $rolesArray = ['Admin', 'Tech', 'Manager', 'User'];
            foreach ($rolesArray as $role)
                {
                    DB::table('roles')->insert([
                        'name' => $role
                    ]);
                }

    }
}
