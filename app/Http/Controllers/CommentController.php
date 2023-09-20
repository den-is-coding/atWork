<?php

namespace App\Http\Controllers;

use App\Http\Filters\CommentFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Comment $comment, Request $request)
    {
        $comments = $comment
            ->when($request->company_id, function ($query) use ($request) {
                $query->where('company_id', '=', $request->company_id);
            })
            ->orderBy('score')
            ->paginate();
        return CommentResource::collection($comments);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'content'=>'string|min:150 | max: 550',
            'score'=>'integer|between:1,10',
            'member_id'=>'required|exists:members,id',
            'company_id'=>'required|exists:companies,id',
        ]);


        $comment_content = $request->input('content');
        $comment_score = $request->input('score');
        $comment_member_id = $request->input('member_id');
        $comment_company_id = $request->input('company_id');

        $comment = Comment::create([
            'content'=>$comment_content,
            'score'=>$comment_score,
            'member_id'=>$comment_member_id,
            'company_id'=>$comment_company_id,
        ]);
        return response($comment, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $this -> validate($request, [
            'content'=>'min:150 | max: 550',
            'score'=>'integer|between:1,10',
            'member_id'=>'required|exists:members,id',
            'company_id'=>'required|exists:companies,id',
        ]);


        $comment_content = $request->input('content');
        $comment_score = $request->input('score');
        $comment_member_id = $request->input('member_id');
        $comment_company_id = $request->input('company_id');

        $comment -> update([
            'content'=>$comment_content,
            'score'=>$comment_score,
            'member_id'=>$comment_member_id,
            'company_id'=>$comment_company_id,
        ]);

        return response()->json([
            'data' => new CommentResource($comment),
            200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment -> delete();
        return response() -> json(null, 204);
    }
}
