<?php

namespace App\Http\Controllers;

use App\Http\Requests\Add\StoreRequest;
use App\Http\Requests\Add\UpdateRequest;
use App\Models\Add;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AddController extends Controller
{
    public function index() {

        $adds = Add::with(['user'])->withCount('comments')->onlyOtherUsersAdds();

        if(!Auth::user()->hasRole(Role::getAdminRole())) $adds = $adds->published();

        $adds = $adds->paginate(3);

        return view('adds.index', compact('adds'));
    }

    public function show($id)
    {
        $add = Add::with('comments')->findOrFail($id);

        if ($add->user_id !== Auth::id()) $add = $add->published()->findOrFail($id);

        return view('adds.view', compact('add'));
    }

    public function create() {

        return view('adds.create');
    }

    public function store(StoreRequest $request) {

        $add = new Add($request->validated());
        $add->user_id = Auth::id();
        $file = $request->file('image');
        $add->image_url = Storage::disk('public')->putFileAs(
            'images', $file, time() . $file->getClientOriginalName()
        );
        $add->save();

        return redirect('/dashboard')->with('add_added_success', config('config.messages.adds.add_added_success'));
    }

    public function update(UpdateRequest $request) {

        $add = Add::findOrFail($request->get('add_id'));

        $add->update($request->validated());

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $add->image_url = Storage::disk('public')->putFileAs(
                'images', $file, time() . $file->getClientOriginalName()
            );
            $add->save();
        }

        return redirect()->back()->with('add_updated_success', config('config.messages.adds.add_updated_success'));

    }

    public function publish(Request $request) {

        $add = Add::findOrFail($request->get('add_id'));

        $add->publish();

        return redirect()->back()->with('add_published_success', config('config.messages.adds.add_published_success'));
    }

    public function unpublish(Request $request) {

        $add = Add::findOrFail($request->get('add_id'));

        $add->unpublish();

        return redirect()->back()->with('add_unpublished_success', config('config.messages.adds.add_unpublished_success'));
    }
}
