<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LikeResource;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Blog $blog)
    {
        $likes = LikeResource::collection($blog->likes()->with(['user', 'blog'])->latest()->paginate());

        return $likes;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Blog $blog)
    {
        $like = $blog->likes()->create([
            'user_id' => 1
        ]);

        return new LikeResource($like);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog, Like $like)
    {
        return new LikeResource($like);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog, Like $like)
    {
        $like->delete();
        return response(status: 204);
    }
}
