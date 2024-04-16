<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

use App\Http\Controllers\Api\BlogController as ApiBlogController;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Instantiate the API BlogController
        $apiBlogController = new ApiBlogController();

        // Call the index method of the API BlogController
        $blogs = $apiBlogController->index();

        return view('pages.blog.index', compact('blogs'));

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {


        // Instantiate the API BlogController
        $apiBlogController = new ApiBlogController();

        // Call the index method of the API BlogController
        $blog = $apiBlogController->show($blog);

        // return $blog;

        return view('pages.blog.show', compact('blog'));

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
