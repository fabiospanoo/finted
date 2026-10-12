<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class PublicController extends Controller
{
    public function home()
    {
        // Gli ultimi 4 annunci, dal più recente al meno recente
        $articles = Article::with(['category', 'user'])->latest()->take(5)->get();
        // chiedere ad alessandro
        $categories = Category::orderBy('name')->get();

        return view('welcome', compact('articles', 'categories'));
    }
}
