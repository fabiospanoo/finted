<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {
        
        return view('articles.index');
    }

    public function create() {
        return view('articles.create');
    }
}
