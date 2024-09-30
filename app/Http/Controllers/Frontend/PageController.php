<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Company;
use App\Models\post;
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
        $news->increment('views');

        $advertises = Advertise::where('status', 1)->get();

        $company = Company::first();

        $comments = Comment::where('news_id', $news->id)->where('approved', true)->get();



        return view('frontend.news', compact('advertises', 'news', 'company', 'comments'));
    }
}
