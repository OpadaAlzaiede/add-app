<?php

namespace App\Http\Controllers;

use App\Models\Add;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function index() {

        $adds = Add::with(['user'])->withCount('comments')->onlyOtherUsersAdds()->paginate(10);

        return view('adds', compact('adds'));
    }
}
