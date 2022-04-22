<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::max('id');
        $role = Role::max('id');
        for($int = 1; $int <= $user; $int++)
        {
            DB::table('role_users')->insert([
                'user_id' => $int,
                'role_id' => rand(1, $role),
            ]);
        }
    }
}
