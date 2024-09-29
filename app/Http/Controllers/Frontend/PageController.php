<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

        $latest_news = post::orderBy('id', 'desc')->first();
        $trending_news = post::orderBy('views', 'desc')->limit(8)->get();
        return view('frontend.home', compact('latest_news', 'trending_news'));
    }
}
