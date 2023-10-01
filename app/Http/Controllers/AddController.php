<?php

namespace App\Http\Controllers;

use App\Models\Add;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function index() {

        $adds = Add::with(['user'])->withCount('comments')->onlyOtherUsersAdds()->paginate(3);

        return view('adds.index', compact('adds'));
    }

    public function show($id) {

        $add = Add::with('comments')->findOrFail($id);

        return view('adds.view', compact('add'));
    }
}
