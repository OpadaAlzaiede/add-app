<?php


namespace App\Services\Adds;


use App\Models\Add;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EloquentUserService implements AddQueryService, AddStoreService
{
    public function index()
    {
        return Add::with(['user'])->withCount('comments')->onlyOtherUsersAdds()
                                ->published()->paginate(Add::getPaginationPerPage());
    }

    public function show($id)
    {
        $add = Add::with('comments')->findOrFail($id);

        if($add->user_id !== Auth::id()) $add = $add->published()->findOrFail($id);

        return $add;
    }

    public function store($data)
    {
        $add = new Add($data);
        $add->user_id = Auth::id();
        $file = $data['image'];
        $add->image_url = Storage::disk('public')->putFileAs(
            'images', $file, time() . $file->getClientOriginalName()
        );
        $add->save();

        return $add;
    }

    public function update($id, $data)
    {
        $add = Add::findOrFail($id);

        $add->update($data);

        if(isset($data['image'])) {
            $file = $data['image'];
            $add->image_url = Storage::disk('public')->putFileAs(
                'images', $file, time() . $file->getClientOriginalName()
            );
            $add->save();
        }

        return $add;
    }

    public function publish($id)
    {
        $add = Add::findOrFail($id);

        $add->publish();

        return $add;
    }

    public function unpublish($id)
    {
        $add = Add::findOrFail($id);

        $add->unpublish();

        return $add;
    }
}
