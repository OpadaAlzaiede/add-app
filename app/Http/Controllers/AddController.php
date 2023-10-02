<?php

namespace App\Http\Controllers;

use App\Http\Requests\Add\StoreRequest;
use App\Http\Requests\Add\UpdateRequest;
use App\Services\Adds\AddQueryService;
use App\Services\Adds\AddStoreService;
use Illuminate\Http\Request;

class AddController extends Controller
{
    protected $addQueryService;
    protected $addStoreService;

    public function __construct(AddQueryService $queryService, AddStoreService $storeService)
    {
        $this->addQueryService = $queryService;
        $this->addStoreService = $storeService;
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

    public function create() {

        return view('adds.create');
    }

    public function store(StoreRequest $request) {

        $this->addStoreService->store($request->validated());

        return redirect('/dashboard')->with('add_added_success', config('config.messages.adds.add_added_success'));
    }

    public function update(UpdateRequest $request) {

        $this->addStoreService->update($request->get('add_id'), $request->validated());

        return redirect()->back()->with('add_updated_success', config('config.messages.adds.add_updated_success'));

    }

    public function publish(Request $request) {

        $this->addStoreService->publish($request->get('add_id'));

        return redirect()->back()->with('add_published_success', config('config.messages.adds.add_published_success'));
    }

    public function unpublish(Request $request) {

        $this->addStoreService->unpublish($request->get('add_id'));

        return redirect()->back()->with('add_unpublished_success', config('config.messages.adds.add_unpublished_success'));
    }
}
