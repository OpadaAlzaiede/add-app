<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Users\UserService;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function activate(Request $request) {

        $this->userService->activate($request->get('user_id'));

        return redirect()->back()->with('user_activation_success', config('constants.messages.users.user_activation_success'));
    }

    public function deActivate(Request $request) {

        $this->userService->deactivate($request->get('user_id'));

        return redirect()->back()->with('user_deactivation_success', config('constants.messages.users.user_deactivation_success'));
    }
}
