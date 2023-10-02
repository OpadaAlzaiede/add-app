<?php


namespace App\Services\Users;


use App\Models\User;

class EloquentAdminService implements UserService
{
    public function index()
    {
        return User::usersOnly()->paginate(User::getPaginationPerPage());
    }

    public function activate($id)
    {
        $user = User::findOrFail($id);

        $user->activate();

        return $user;
    }

    public function deactivate($id)
    {
        $user = User::findOrFail($id);

        $user->deActivate();

        return $user;
    }
}
