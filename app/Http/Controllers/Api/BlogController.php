<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest();
        return BlogResource::collection($blogs->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = Blog::create([
            ...$request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|string',
            ]),
            'user_id' => 1
        ]);

        return new BlogResource($blog);
    }


    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {

        return new BlogResource($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->update(
            $request->validate([
                'title' => 'sometimes|string|max:255',
                'content' => 'sometimes|string',
                'image' => 'nullable|string',
            ])
        );

        return new BlogResource($blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return response(status: 204);
    }
}
