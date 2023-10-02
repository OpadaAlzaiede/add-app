<?php

namespace App\Http\Controllers;

use App\Models\Add;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {

        $adds = Add::withoutGlobalScopes()->withCount('comments')->where('user_id', Auth::id())->paginate(3);

        return view('dashboard', compact('adds'));
    }
}
