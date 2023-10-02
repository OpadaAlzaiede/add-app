<?php


namespace App\Services\Adds;


use App\Models\Add;

class EloquentAdminService implements AddQueryService, AddDeletionService
{
    public function index() {

        return Add::with(['user'])->withCount('comments')->onlyOtherUsersAdds()->paginate(Add::getPaginationPerPage());
    }

    public function show($id)
    {
        return Add::with('comments')->findOrFail($id);
    }

    public function destroy($id)
    {
        $add = Add::findOrFail($id);

        return $add->delete();
    }

}
