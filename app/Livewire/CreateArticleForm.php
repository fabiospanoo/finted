<?php

namespace App\Livewire;

use App\Jobs\ResizeImage;
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

    #[Validate('required|array|min:1|max:6')]
    public $images = [];

    public $temporary_images = [];

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'images' => 'required|array|min:1|max:6',
            'images.*' => 'image|max:1024',
        ], [
            'images.required' => __('validation.custom.images.required'),
            'images.min' => __('validation.custom.images.min'),
            'images.max' => __('validation.custom.images.max'),
            'images.*.image' => __('validation.custom.images.invalid_file'),
            'images.*.max' => __('validation.custom.images.file_size'),
        ]);

        $this->article = Article::create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::id(),
        ]);

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
                dispatch(new ResizeImage($newImage->path, 800, 1200));
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        session()->flash('success', 'Articolo creato correttamente!');
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category_id = '';
        $this->images = [];
        $this->temporary_images = [];
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

    public function selectCategory(int $id): void
    {
        $this->category_id = $id;
        $this->resetValidation('category_id');
    }

    public function render()
    {
        $categories = Category::all();
        $selectedCategoryName = Category::find($this->category_id)?->name;

        return view('livewire.create-article-form', compact('categories', 'selectedCategoryName'));
    }

    public function updatedTemporaryImages()
    {
        $this->validate([
            'temporary_images' => 'array|max:6',
            'temporary_images.*' => 'image|max:1024',
        ]);

        if (count($this->images) + count($this->temporary_images) > 6) {
            $this->addError('temporary_images', __('validation.custom.images.max'));
            $this->temporary_images = [];

            return;
        }

        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }

        $this->temporary_images = [];
        $this->resetValidation('images');
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
            $this->images = array_values($this->images);
        }
    }
}
