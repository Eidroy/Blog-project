<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Workshops;
use App\Http\Requests\StoreWorkshopsRequest;
use App\Http\Requests\UpdateWorkshopsRequest;

use App\Http\Resources\WorkshopsResource;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class WorkshopsController extends Controller
{
    public function index()
    {
        return WorkshopsResource::collection(Workshops::all());
    }

    public function store(StoreWorkshopsRequest $request)
    {
        $workshops = Workshops::create($request->validated());

        return WorkshopsResource::make($workshops);
    }

    public function show(Workshops $workshop)
    {
        return WorkshopsResource::make($workshop);
    }

    public function update(UpdateWorkshopsRequest $request, Workshops $workshop)
    {
        $workshop->update($request->validated());

        return WorkshopsResource::make($workshop);
    }

    public function destroy(Workshops $workshop)
    {
        $workshop->delete();

        return response()->NoContent();
    }
}
