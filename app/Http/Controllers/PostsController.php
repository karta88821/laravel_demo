<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store(Request $request) {

        // Check whether the input is valid or not
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
        ]);

        // Insert the new comment into the database
        $post = Posts::create($data);

        $data = [
            'post_id' => $post->id,
            'title' => $post->title,
            'content' => $post->content
        ];

        return response()->json([
            'message' => "Post created.",
            'data' => $data
        ], 201);
    }

    public function retrieveAll(Request $request) {
        // select all posts
        $posts = Posts::select('id', 'title', 'content', 'created_at')->get();

        return response()->json([
            'message' => "Posts retrieved.",
            'data' => $posts
        ], 200);
    }

    public function retrieveOne(Request $request, $post_id) {
        // Check whether the post having the id = $post_id exists or not
        $post = Posts::select('id', 'title', 'content', 'created_at')->where('id', $post_id);

        if (is_null($post)) {
            return response()->json([
                'message' => "Post does not exist."
            ], 404);
        }

        return response()->json([
            'message' => "Post retrieved.",
            'data' => $post->get()
        ], 200);

    }
}
