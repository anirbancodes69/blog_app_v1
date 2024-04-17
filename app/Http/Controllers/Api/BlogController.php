<?php

namespace App\Http\Controllers\Api;

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
        $latestBlogs = Blog::with('categories.category')->latest()->take(6)->get();

        $mostLikedBlogs = Blog::with('categories.category')->mostLiked()->get();

        return [
            "latestBlogs" => $latestBlogs,
            "mostLikedBlogs" => $mostLikedBlogs,
        ];
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

        return $blog;
    }


    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {

        return $blog->loadCount('likes')->load(['user', 'categories.category']);
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

        return $blog;
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
