<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware():array{
        return [new Middleware ('auth', only:['create'])];
    }
    public function index() {
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);
        return view('articles.index');
    }

    public function create() {
        return view('articles.create');
    }
}
