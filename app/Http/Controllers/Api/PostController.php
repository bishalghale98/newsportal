<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function categories()
    {
        $categories = Category::all();

        // return response()->json($categories);

        return CategoryResource::collection($categories);
    }

    public function latest_post()
    {
        $latest_news = Post::where('status', 'approved')->orderBy('id', 'desc')->first();

        return new PostResource($latest_news);
    }

    public function trending_post()
    {
        $trending_news = post::where('status', 'approved')->orderBy('views', 'desc')->limit(8)->get();

        return PostResource::collection($trending_news);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->paginate(10);

        return PostResource::collection($posts);
    }

    public function post($id)
    {

        $post = Post::findOrFail($id);

        // Create a session key based on the post ID to track views
        $sessionKey = 'post_viewed_' . $id;

        // Check if the user has already viewed the post in this session
        if (!session()->has($sessionKey)) {
            // Increment the views count
            $post->increment('views');

            // Store the session key to prevent further increments
            session()->put($sessionKey, true);
        }

        return new PostResource($post);
    }
}
