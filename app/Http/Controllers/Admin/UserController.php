<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function activate(Request $request) {

        $user = \App\Models\User::findOrFail($request->get('user_id'));

        $user->activate();

        return redirect()->back()->with('user_activation_success', config('user_activation_success'));
    }

    public function deActivate(Request $request) {

        $user = \App\Models\User::findOrFail($request->get('user_id'));

        $user->deActivate();

        return redirect()->back()->with('user_deactivation_success', config('user_activation_success'));
    }
}
