<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateArticleForm extends Component
{
    #[Validate('required|string|max:255')]
    public $title;

    #[Validate('required|string')]
    public $body;

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('nullable|exists:categories,id')]
    public $category_id;

    public function store()
    {
        $this->validate();

        Article::create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'category_id' => $this->category_id,
        ]);

        $this->resetInputs();

        session()->flash('success', 'Articolo creato con successo');
    }

    public function resetInputs()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category_id = '';
    }

    protected function messages()
    {
        return [
            'title.required' => 'il campo :attribute è necessario!.',
            'title.min' => 'Il campo :attribute e\' troppo corto.',
            'body.required' => 'il campo :attribute è necessario!.',
            'body.min' => 'Il campo :attribute e\' troppo corto.',
            'price.required' => 'il campo :attribute è necessario!.',
            'price.min' => 'Il campo :attribute e\' troppo basso.',
        ];
    }

    public function selectCategory($id)
    {
        $this->category_id = $id;
    }

    public function render()
    {
        $categories = Category::all();
        $selectedCategoryName = Category::find($this->category_id)?->name;

        return view('livewire.create-article-form', compact('categories', 'selectedCategoryName'));
    }
}
