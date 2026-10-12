<?php

use App\Livewire\CreateArticleForm;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('no category is selected until the user chooses one', function () {
    $firstCategory = Category::create(['name' => 'Elettronica']);
    Category::create(['name' => 'Casa e giardino']);

    Livewire::test(CreateArticleForm::class)
        ->assertSet('category_id', null)
        ->assertDontSeeHtml('<span class="badge-accent">')
        ->assertDontSeeHtml('create-cat-pill active')
        ->call('selectCategory', $firstCategory->id)
        ->assertSet('category_id', $firstCategory->id)
        ->assertSeeHtml('<span class="badge-accent">')
        ->assertSee('Elettronica')
        ->assertSeeHtml('class="create-cat-pill active"');
});
