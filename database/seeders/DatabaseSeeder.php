<?php

namespace Database\Seeders;

use App\Models\Add;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(10)->create();

        foreach ($users as $user) {
            $user->assignRole(Role::getUserRole());

            Auth::login($user);
            Add::factory(10)->create(['user_id' => $user->id]);
        }
    }
}
