<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Comments;
use App\Http\Requests\StorecommentsRequest;
use App\Http\Requests\UpdatecommentsRequest;

use App\Http\Resources\CommentsResource;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;


class CommentsController extends Controller
{
    public function index()
    {
        return CommentsResource::collection(Comments::all());
    }

    public function store(StorecommentsRequest $request)
    {
        $comments = Comments::create($request->validated());

        return CommentsResource::make($comments);
    }

    public function show(Comments $comment)
    {
        return CommentsResource::make($comment);
    }

    public function update(UpdatecommentsRequest $request, Comments $comment)
    {
        $comment->update($request->validated());

        return CommentsResource::make($comment);
    }

    public function destroy(Comments $comment)
    {
        $comment->delete();

        return response()->NoContent();
    }
}
