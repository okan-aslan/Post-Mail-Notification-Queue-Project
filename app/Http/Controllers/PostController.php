<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponses;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    use ApiResponses;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(10);

        return $this->success(PostResource::collection($posts->load('user')), 'Showing posts.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = $request->user()->posts()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return $this->success(new PostResource($post), 'Post created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $this->success(new PostResource($post->load('user')), 'Showing post.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('authorize', $post);

        if ($post->status === 'published') {
            $post->status = 'pending';
        }

        $post->update($request->validated());

        return $this->success(new PostResource($post), 'Post updated successfully', 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('authorize', $post);

        $post->delete();

        return $this->success(null, 'Post deleted successfully.', 200);
    }
}
