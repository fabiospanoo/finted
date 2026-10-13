<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/index', [ArticleController::class, 'index'])->name('tutti-gli-articoli');   
Route::get('/create-article', [ArticleController::class, 'create'])->name('crea-articolo');   
Route::get('/show-article/{article}', [ArticleController::class, 'show'])->name('mostra-articolo');
Route::get('/byCategory/{category}', [ArticleController::class, 'byCategory'])->name('categoria');
Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');