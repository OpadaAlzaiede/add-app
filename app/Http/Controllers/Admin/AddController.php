<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Add;
use Illuminate\Http\Request;

class AddController extends Controller
{

    public function __invoke(Request $request)
    {
        $add = Add::findOrFail($request->get('add_id'));

        $add->delete();

        return redirect()->back()->with('add_deletion_success', config('add_deletion_success'));
    }
}
