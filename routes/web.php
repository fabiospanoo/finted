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
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::patch('/revisor/articles/{article}/restore', [RevisorController::class, 'restore'])->name('restore');
Route::delete('/revisor/articles/{article}', [RevisorController::class, 'destroy'])->name('revisor.destroy');

Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::post('/revisor/request', [RevisorController::class, 'sendRevisorRequest'])->middleware('auth')->name('become.revisor.send');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('search/article', [PublicController::class, 'searchArticles'])->name('article.search');

// cambio lingua
Route::post('language/{lang}', [PublicController::class, 'setLanguage'])->name('language');