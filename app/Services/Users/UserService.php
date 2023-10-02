<?php


namespace App\Services\Users;


interface UserService
{
    public function index();
    public function activate($id);
    public function deactivate($id);
}
