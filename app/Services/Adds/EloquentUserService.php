<?php


namespace App\Services\Adds;


use App\Models\Add;
use App\Traits\Attachments;
use Illuminate\Support\Facades\Auth;

class EloquentUserService implements AddQueryService, AddStoreService
{
    use Attachments;

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
        $file = $data['image'];

        try {
            $data['image_url'] = $this->storeFileInStorage($file);
        } catch (\Exception $e) {
            throw $e;
        }

        return Add::create($data);
    }

    public function update($id, $data)
    {
        $add = Add::findOrFail($id);

        if(isset($data['image'])) {
            $this->deleteFileFromStorage($add->image_url);
            $file = $data['image'];
            $data['image_url'] = $this->storeFileInStorage($file);
        }

        $add->update($data);

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
