<?php


namespace App\Services\Users;


use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EloquentAuthService implements UserStoreService
{

    public function store($data)
    {
        $user = new User($data);
        $user->password = Hash::make($user->password);
        $user->save();

        $user->assignRole(Role::getUserRole());
    }
}
