<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Category;
use App\Models\Company;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    //
    public function __construct()
    {
        $company = Company::first();
        $categories = Category::all();

        View::share([
            'company' => $company,
            'categories' => $categories,
        ]);
    }



    public function home()
    {
        $latest_news = post::where('status', 'approved')->orderBy('id', 'desc')->first();
        $trending_news = post::where('status', 'approved')->orderBy('views', 'desc')->limit(8)->get();
        return view('frontend.home', compact('latest_news', 'trending_news'));
    }


    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->paginate(10);

        $advertises = Advertise::where('status', 1)->get();

        return view('frontend.categoryNews', compact('posts', 'advertises'));
    }




    public function news($id)
    {
        // Fetch the post with the related category
        $news = Post::findOrFail($id);

        // Create a session key based on the post ID to track views
        $sessionKey = 'post_viewed_' . $id;

        // Check if the user has already viewed the post in this session
        if (!session()->has($sessionKey)) {
            // Increment the views count
            $news->increment('views');

            // Store the session key to prevent further increments
            session()->put($sessionKey, true);
        }

        // Fetch related data (e.g., ads, company information)
        $advertises = Advertise::where('status', 1)->get();
        $company = Company::first();

        return view('frontend.news', compact('advertises', 'news', 'company'));
    }

    // Method to handle AJAX view increment request
    public function incrementView(Request $request)
    {
        $news = Post::find($request->news_id);
        if ($news) {
            $news->increment('views');
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function search(Request $request)
    {
        $q = $request->q;

        session(['search_query' => $q]);

        $posts = Post::where('title', 'like', '%' . $q . '%')->orWhere('description', 'like', '%' . $q . '%')->paginate(10);


        $advertises = Advertise::where('status', 1)->get();

        return view('frontend.searchNews', compact('posts', 'advertises', 'q'));
    }
}
