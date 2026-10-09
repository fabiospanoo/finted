<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleIndexTable extends Component
{
    public function render()
    {
        $articles = Article::all();
        return view('livewire.article-index-table', compact('articles'));
    }
}
