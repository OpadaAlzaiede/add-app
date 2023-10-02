<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Add;
use App\Services\Adds\AddDeletionService;
use App\Services\Adds\AddQueryService;
use Illuminate\Http\Request;

class AdminAddController extends Controller
{
    protected $addQueryService;
    protected $addDeletionService;

    public function __construct(AddQueryService $queryService, AddDeletionService $deletionService)
    {
        $this->addQueryService = $queryService;
        $this->addDeletionService = $deletionService;
    }

    public function index() {

        $adds = $this->addQueryService->index();

        return view('adds.index', compact('adds'));
    }

    public function show($id)
    {
        $add = $this->addQueryService->show($id);

        return view('adds.view', compact('add'));
    }

    public function destroy(Request $request) {

        $this->addDeletionService->destroy($request->get('add_id'));

        return redirect()->back()->with('add_deletion_success', config('constants.messages.adds.add_deletion_success'));
    }
}
