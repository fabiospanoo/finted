<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticleForm extends Component
{
    use WithFileUploads;

      public $article; 

    #[Validate('required|string|max:255')]
    public $title;

    #[Validate('required|string')]
    public $body;

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('required|exists:categories,id')]
    public $category_id;

    public $images = [];
    public $temporary_images;

    public function store()
    {
        $this->validate();

        $this->article = Article::create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::id()
        ]);

        if (count($this->images) > 0) {
        foreach ($this->images as $image) {
            $newFileName = "articles/{$this->article->id}/";
            $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
            dispatch(new ResizeImage($newImage->path, 300, 300));
        }
        File::deleteDirectory(storage_path('app/livewire-tmp'));
        }
        
                $this->resetInputs();
                // $this->cleanForm();
                session()->flash('success', 'Articolo creato con successo');

}
    

    public function resetInputs()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category_id = '';
        $this->images = [];
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
            'category_id.required' => 'il campo categoria è necessario!.',
            'category_id.exists' => 'La categoria selezionata non è valida.',
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

    public function updatedTemporaryImages()
    {
       if ($this->validate([
            'temporary_images.*' => 'image|max:1024', // 1MB Max
            'temporary_images' => 'max:5', // Max 5 images
        ])) {
            foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        };
            }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
}