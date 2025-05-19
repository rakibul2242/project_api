<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->category = $request->category;
        $post->description = $request->description;

        if ($post->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'New post created successfully',
                'post' => $post
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Something is wrong',
                'post' => $post
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string'
        ]);

        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                'status' => 'error',
                'message' => 'Post not found',
            ]);
        }
        $post->title = $request->title;
        $post->category = $request->category;
        $post->description = $request->description;

        if ($post->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Post updated successfully',
                'post' => $post
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Something is wrong',
                'post' => $post
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
