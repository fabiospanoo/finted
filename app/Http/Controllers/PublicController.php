<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class PublicController extends Controller
{
    public function home()
    {
        $categories = Category::orderBy('name')->get();

        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(5)->get();

        return view('welcome', compact('articles', 'categories'));
    }
}
