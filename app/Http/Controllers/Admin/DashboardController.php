<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Users\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke() {

        $users = $this->userService->index();

        return view('admin.dashboard', compact('users'));
    }
}
