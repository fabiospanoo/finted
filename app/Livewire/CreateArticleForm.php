<?php

namespace App\Livewire;

use App\Models\Article;
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
    public $category;

    public function store(){
        $this->validate();
        
        Article::create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'category'=> $this->category
        ]);

        $this->resetInputs();

        session()->flash('success', 'Articolo creato con successo');
    }

    public function resetInputs(){
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
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
    

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
