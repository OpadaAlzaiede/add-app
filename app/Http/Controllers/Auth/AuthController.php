<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use League\Flysystem\Config;
use MongoDB\Driver\Session;

class AuthController extends Controller
{

    public function getLogin() {

        return view('auth.login');
    }

    public function getRegister() {

        return view('auth.register');
    }

    public function login(LoginRequest $request) {

        if(!Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'is_activated' => 1])) {

            \session()->flash('login_fail', \config('constants.messages.auth.login_fail'));

            return redirect()->route('login')->withInput();
        }

        \session()->flash('login_success', \config('constants.messages.auth.login_success'));

        if(Auth::user()->hasRole(Role::getAdminRole())) {

            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('dashboard');
    }

    public function register(RegisterRequest $request) {

        $user = new User($request->validated());
        $user->password = Hash::make($user->password);
        $user->save();

        $user->assignRole(Role::getUserRole());

        \session()->flash('register_success', \config('constants.messages.auth.register_success'));

        return redirect()->route('/');
    }

    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('/');
    }
}
