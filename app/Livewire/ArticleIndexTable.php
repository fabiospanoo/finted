<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleIndexTable extends Component
{
    public function render()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('livewire.article-index-table', compact('articles'));
    }
}
